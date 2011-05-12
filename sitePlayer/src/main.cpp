#include <QtGui/QApplication>
#include <QTranslator>
#include <QLocale>
#include <QLibraryInfo>

#include "siteplayer.h"

#include <QCoreApplication>

int main(int argc, char *argv[])
{
    QApplication a(argc, argv);
    QCoreApplication::setApplicationName("test");

   /* QString local = QLocale::system().name();
    QTranslator translator;
    translator.load(QString("qt_")+local, QLibraryInfo::location(QLibraryInfo::TranslationsPath));
    a.installTranslator(&translator);
*/
    SitePlayer w;
    w.show();

    return a.exec();
}
