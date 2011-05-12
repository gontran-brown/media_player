/********************************************************************************
** Form generated from reading UI file 'siteplayer.ui'
**
** Created: Sat May 7 21:27:50 2011
**      by: Qt User Interface Compiler version 4.7.3
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_SITEPLAYER_H
#define UI_SITEPLAYER_H

#include <QtCore/QVariant>
#include <QtGui/QAction>
#include <QtGui/QApplication>
#include <QtGui/QButtonGroup>
#include <QtGui/QGridLayout>
#include <QtGui/QHeaderView>
#include <QtGui/QMainWindow>
#include <QtGui/QMenuBar>
#include <QtGui/QStatusBar>
#include <QtGui/QToolBar>
#include <QtGui/QWidget>
#include <QtWebKit/QWebView>

QT_BEGIN_NAMESPACE

class Ui_SitePlayer
{
public:
    QAction *actionQuitter;
    QWidget *centralWidget;
    QGridLayout *gridLayout;
    QWebView *webView;
    QMenuBar *menuBar;
    QToolBar *mainToolBar;
    QStatusBar *statusBar;

    void setupUi(QMainWindow *SitePlayer)
    {
        if (SitePlayer->objectName().isEmpty())
            SitePlayer->setObjectName(QString::fromUtf8("SitePlayer"));
        SitePlayer->resize(627, 590);
        actionQuitter = new QAction(SitePlayer);
        actionQuitter->setObjectName(QString::fromUtf8("actionQuitter"));
        centralWidget = new QWidget(SitePlayer);
        centralWidget->setObjectName(QString::fromUtf8("centralWidget"));
        gridLayout = new QGridLayout(centralWidget);
        gridLayout->setSpacing(6);
        gridLayout->setContentsMargins(11, 11, 11, 11);
        gridLayout->setObjectName(QString::fromUtf8("gridLayout"));
        webView = new QWebView(centralWidget);
        webView->setObjectName(QString::fromUtf8("webView"));
        webView->setUrl(QUrl("about:blank"));

        gridLayout->addWidget(webView, 0, 0, 1, 1);

        SitePlayer->setCentralWidget(centralWidget);
        menuBar = new QMenuBar(SitePlayer);
        menuBar->setObjectName(QString::fromUtf8("menuBar"));
        menuBar->setGeometry(QRect(0, 0, 627, 25));
        SitePlayer->setMenuBar(menuBar);
        mainToolBar = new QToolBar(SitePlayer);
        mainToolBar->setObjectName(QString::fromUtf8("mainToolBar"));
        SitePlayer->addToolBar(Qt::TopToolBarArea, mainToolBar);
        statusBar = new QStatusBar(SitePlayer);
        statusBar->setObjectName(QString::fromUtf8("statusBar"));
        SitePlayer->setStatusBar(statusBar);

        retranslateUi(SitePlayer);

        QMetaObject::connectSlotsByName(SitePlayer);
    } // setupUi

    void retranslateUi(QMainWindow *SitePlayer)
    {
        SitePlayer->setWindowTitle(QApplication::translate("SitePlayer", "SitePlayer", 0, QApplication::UnicodeUTF8));
        actionQuitter->setText(QApplication::translate("SitePlayer", "Quitter", 0, QApplication::UnicodeUTF8));
    } // retranslateUi

};

namespace Ui {
    class SitePlayer: public Ui_SitePlayer {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_SITEPLAYER_H
