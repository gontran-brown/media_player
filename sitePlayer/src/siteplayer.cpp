#include "siteplayer.h"
#include "ui_siteplayer.h"

#include <QCoreApplication>
#include <QProgressBar>
#include <QVBoxLayout>
#include <QFile>
#include <QWebSettings>
#include <QMetaObject>
#include <QAbstractVideoSurface>
#include <QVideoSurfaceFormat>
#include <QWebInspector>

SitePlayer::SitePlayer(QWidget *parent) :
    QMainWindow(parent),ui(new Ui::SitePlayer)
{
    ui->setupUi(this);
    QWebSettings::globalSettings()->setAttribute(QWebSettings::PluginsEnabled, true);
    QWebSettings::globalSettings()->setAttribute(QWebSettings::DeveloperExtrasEnabled, true);

    // Génération des widgets de la fenêtre principale
    creerActions();
    creerMenus();
    creerBarresOutils();
    creerBarreEtat();

    //creation des onglets
    onglets = new QTabWidget;
    onglets->addTab(creerOngletPageWeb(QCoreApplication::applicationDirPath() + "/../www/index.html"),tr("boite a outils"));// ladresse dans la bare des louverture de lappli
    connect(onglets, SIGNAL(currentChanged(int)), this, SLOT(changementOnglet(int)));

    resize(700,700);
    // Génération des onglets et chargement de la page d'accueil
    setCentralWidget(onglets);
}

SitePlayer::~SitePlayer(){
    delete ui;
}

void SitePlayer::creerActions(){
    actionNouvelOnglet = new QAction(tr("Nouvel onglet"), this);
    actionNouvelOnglet->setShortcut(tr("Ctrl+T"));
    connect(actionNouvelOnglet, SIGNAL(triggered()), this, SLOT(nouvelOnglet()));

    actionFermerOnglet = new QAction(tr("Fermer l'onglet"), this);
    actionFermerOnglet->setShortcut(tr("Ctrl+W"));
    connect(actionFermerOnglet, SIGNAL(triggered()), this, SLOT(fermerOnglet()));

    actionActualiser = new QAction(tr("Actualiser"), this);
    actionActualiser->setShortcut(QKeySequence::Refresh);
    connect(actionActualiser, SIGNAL(triggered()), this, SLOT(actualiser()));

    actionGo = new QAction(tr("&Go!"), this);
    connect(actionGo, SIGNAL(triggered()), this, SLOT(chargerPage()));

    actionQuitter = new QAction(tr("&Quitter"), this);
    actionQuitter->setShortcut(tr("Ctrl+Q"));
    connect(actionQuitter, SIGNAL(triggered()), qApp, SLOT(quit()));

    actionNouveauFichier = new QAction(tr("&Nouveau fichier"), this);
    actionNouveauFichier->setShortcut(tr("Ctrl+N"));
    connect(actionNouveauFichier, SIGNAL(triggered()), this, SLOT(newFile()));

    actionStop = new QAction(tr("S&top"), this);
    connect(actionStop, SIGNAL(triggered()), this, SLOT(stop()));

    //action pour le player
    actionPlay = new QAction(tr("P&lay"), this);
    connect(actionPlay,SIGNAL(triggered()),this,SLOT(jouer()));
    actionPause = new QAction(tr("P&ause"), this);
    connect(actionPause, SIGNAL(triggered()), this, SLOT(pause()));
    actionArret = new QAction(tr("A&rret"), this);
    connect(actionArret, SIGNAL(triggered()), this, SLOT(rejouer()));
}

void SitePlayer::creerMenus(){
    QMenu *menuFichier = menuBar()->addMenu(tr("fichier"));

    menuFichier->addAction(actionNouvelOnglet);
    menuFichier->addAction(actionFermerOnglet);

    menuFichier->addSeparator();

    menuFichier->addAction(actionQuitter);
    menuFichier->addAction(actionNouveauFichier);

    QMenu *menuNavigation = menuBar()->addMenu(tr("&Navigation"));

    menuNavigation->addAction(actionStop);
    menuNavigation->addAction(actionPlay);
}

void SitePlayer::creerBarresOutils(){
    champAdresse = new QLineEdit;
    connect(champAdresse, SIGNAL(returnPressed()), this, SLOT(chargerPage()));

    QToolBar *toolBarNavigation = addToolBar(tr("Navigation"));

    toolBarNavigation->addAction(actionActualiser);
    toolBarNavigation->addWidget(champAdresse);
    toolBarNavigation->addAction(actionStop);
    toolBarNavigation->addAction(actionGo);
}

void SitePlayer::creerBarreEtat(){
    progression = new QProgressBar(this);
    progression->setVisible(false);
    progression->setMaximumHeight(14);
    statusBar()->addWidget(progression, 1);
}

QWidget *SitePlayer::creerOngletPageWeb(QString url){
    QWidget *pageOnglet = new QWidget;
    QWebView *pageWeb = new QWebView;

    QToolBar *toolBarPlayer = addToolBar(tr("Player"));
    toolBarPlayer->addAction(actionPlay);
    toolBarPlayer->addAction(actionPause);
    toolBarPlayer->addAction(actionArret);

    QVBoxLayout *layout = new QVBoxLayout;
    layout->setContentsMargins(0,0,0,0);
    layout->addWidget(toolBarPlayer);
    layout->addWidget(pageWeb);
    pageOnglet->setLayout(layout);
    if (url.isEmpty()){
        pageWeb->load(QUrl(tr("http://wwww.google.fr")));
    }
    else{
        /*if (url.left(7) != "http://"){
            url = "http://" + url;
        }*/
        pageWeb->load(QUrl(url));
    }

    // Gestion des signaux envoyés par la page web
    connect(pageWeb, SIGNAL(titleChanged(QString)), this, SLOT(changementTitre(QString)));
    connect(pageWeb, SIGNAL(urlChanged(QUrl)), this, SLOT(changementUrl(QUrl)));
    connect(pageWeb, SIGNAL(loadStarted()), this, SLOT(chargementDebut()));
    connect(pageWeb, SIGNAL(loadProgress(int)), this, SLOT(chargementEnCours(int)));
    connect(pageWeb, SIGNAL(loadFinished(bool)), this, SLOT(chargementTermine(bool)));


    return pageOnglet;
}

QWebView *SitePlayer::fenetreActuelle(){
    return onglets->currentWidget()->findChild<QWebView *>();
}

void SitePlayer::changementOnglet(int index){
    changementTitre(fenetreActuelle()->title());
    changementUrl(fenetreActuelle()->url());
}

void SitePlayer::quit(){
    qDebug() << "fermeture de page" << endl;
    exit(0);
}

void SitePlayer::changementTitre(const QString & titreComplet){
    QString titreCourt = titreComplet;

    // On tronque le titre pour éviter des onglets trop larges
    if (titreComplet.size() > 40){
        titreCourt = titreComplet.left(40) + "...";
    }

    setWindowTitle(titreCourt + " - " + tr("PlayerWeb"));
    onglets->setTabText(onglets->currentIndex(), titreCourt);
}

void SitePlayer::changementUrl(const QUrl & url){
    if (url.toString() != tr("html/page_blanche.html")){
        champAdresse->setText(url.toString());
    }
}

void SitePlayer::chargementDebut(){
    progression->setVisible(true);
}

void SitePlayer::chargementEnCours(int pourcentage){
    progression->setValue(pourcentage);
}

void SitePlayer::chargementTermine(bool ok){
    progression->setVisible(false);
    statusBar()->showMessage(tr("Prêt"), 2000);
}

void SitePlayer::chargerPage(){
    QString url = champAdresse->text();

    // On rajoute le "http://" s'il n'est pas déjà dans l'adresse
    if (url.left(7) != "http://"){
        url = "http://" + url;
        champAdresse->setText(url);
    }
    fenetreActuelle()->load(QUrl(url));
}

void SitePlayer::stop(){
    fenetreActuelle()->stop();
}

void SitePlayer::nouvelOnglet(){
    int indexNouvelOnglet = onglets->addTab(creerOngletPageWeb(), tr("nouvel onglet"));

    qDebug()<<"nombres d'onglet"<< onglets->count() <<endl;

    onglets->setCurrentIndex(indexNouvelOnglet);
    champAdresse->setText("");
    champAdresse->setFocus(Qt::OtherFocusReason);
}

void SitePlayer::newFile(){
    qDebug() << "ouverture de nouvelle page" << endl;
    QString fichier = QFileDialog::getOpenFileName(this,tr("ouvrir le fichier desiré"), QDir::currentPath(), "*.flv *.mp4 *.ogv *.ogg *.webm");
    fenetreActuelle()->page()->mainFrame()->findFirstElement("#video").setAttribute("src", QUrl::fromLocalFile(fichier).toString(QUrl::None));
}

void SitePlayer::fermerOnglet(){
    if(onglets->count() > 1){
        onglets->removeTab(onglets->currentIndex());
    }
    else{
        QMessageBox::critical(this, tr("Erreur"), tr("Il faut au moins un onglet !"));
    }
}

void SitePlayer::actualiser(){
    fenetreActuelle()->reload();
}

void SitePlayer::jouer(){
    qDebug() << "utiliser le boutton jouer" << endl;

    //video.start()

    //enregistrer le temps / demarrer un chrono
}

void SitePlayer::pause(){
    qDebug() << "utiliser le boutton pause" << endl;
    //mettre a pause le chron qui sera lancer par le play
    //enregistrer le temps de pause
}

void SitePlayer::rejouer(){
    QTime time;
    qDebug() << "utiliser le boutton arret" << endl;

    //remmettre a 0 le chrono et revenir au debut de la video

}

/*http://www.siteduzero.com/tutoriel-3-11372-tp-znavigo-le-navigateur-web-des-zeros.html*/
