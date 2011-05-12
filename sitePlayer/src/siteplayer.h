#ifndef SITEPLAYER_H
#define SITEPLAYER_H

#include <QtGui>
#include <QtWebKit>
#include <QMainWindow>

#include <QUrl>
#include <QDebug>
#include <QWebView>
#include <QWebFrame>
#include <QMenu>
#include <QWidget>
#include <QWebElement>

namespace Ui {
class SitePlayer;
}

class SitePlayer : public QMainWindow
{
    Q_OBJECT

public:
    explicit SitePlayer(QWidget *parent = 0);
    ~SitePlayer();

private:
    Ui::SitePlayer *ui;

    void creerActions();
    void creerMenus();
    void creerBarresOutils();
    void creerBarreEtat();

    QTabWidget *onglets;
    QWebView *view;

    QWidget *creerOngletPageWeb(QString url ="");
    QWebView *fenetreActuelle();

    QLineEdit *champAdresse;
    QProgressBar *progression;

    QAction *actionQuitter;
    QAction *actionGo;
    QAction *actionStop;
    QAction *actionPlay;
    QAction *actionPause;
    QAction *actionArret;
    QAction *actionNouveauFichier;
    QAction *actionNouvelOnglet;
    QAction *actionFermerOnglet;
    QAction *actionActualiser;

public slots:
    void quit();

private slots:
    void stop();

    void changementOnglet(int index);
    void chargerPage();
    void changementTitre(const QString & titreComplet);
    void changementUrl(const QUrl & url);
    void actualiser();
    void newFile();
    void nouvelOnglet();
    void fermerOnglet();
    void chargementDebut();
    void chargementEnCours(int pourcentage);
    void chargementTermine(bool ok);

    //les slots pour le player
    void jouer();
    void rejouer();
    void pause();

};

#endif // SITEPLAYER_H
