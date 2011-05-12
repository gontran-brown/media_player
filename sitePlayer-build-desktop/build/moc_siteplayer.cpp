/****************************************************************************
** Meta object code from reading C++ file 'siteplayer.h'
**
** Created: Sat May 7 21:28:18 2011
**      by: The Qt Meta Object Compiler version 62 (Qt 4.7.3)
**
** WARNING! All changes made in this file will be lost!
*****************************************************************************/

#include "../../sitePlayer/src/siteplayer.h"
#if !defined(Q_MOC_OUTPUT_REVISION)
#error "The header file 'siteplayer.h' doesn't include <QObject>."
#elif Q_MOC_OUTPUT_REVISION != 62
#error "This file was generated using the moc from 4.7.3. It"
#error "cannot be used with the include files from this version of Qt."
#error "(The moc has changed too much.)"
#endif

QT_BEGIN_MOC_NAMESPACE
static const uint qt_meta_data_SitePlayer[] = {

 // content:
       5,       // revision
       0,       // classname
       0,    0, // classinfo
      16,   14, // methods
       0,    0, // properties
       0,    0, // enums/sets
       0,    0, // constructors
       0,       // flags
       0,       // signalCount

 // slots: signature, parameters, type, tag, flags
      12,   11,   11,   11, 0x0a,
      19,   11,   11,   11, 0x08,
      32,   26,   11,   11, 0x08,
      54,   11,   11,   11, 0x08,
      81,   68,   11,   11, 0x08,
     110,  106,   11,   11, 0x08,
     130,   11,   11,   11, 0x08,
     143,   11,   11,   11, 0x08,
     153,   11,   11,   11, 0x08,
     168,   11,   11,   11, 0x08,
     183,   11,   11,   11, 0x08,
     213,  201,   11,   11, 0x08,
     239,  236,   11,   11, 0x08,
     263,   11,   11,   11, 0x08,
     271,   11,   11,   11, 0x08,
     281,   11,   11,   11, 0x08,

       0        // eod
};

static const char qt_meta_stringdata_SitePlayer[] = {
    "SitePlayer\0\0quit()\0stop()\0index\0"
    "changementOnglet(int)\0chargerPage()\0"
    "titreComplet\0changementTitre(QString)\0"
    "url\0changementUrl(QUrl)\0actualiser()\0"
    "newFile()\0nouvelOnglet()\0fermerOnglet()\0"
    "chargementDebut()\0pourcentage\0"
    "chargementEnCours(int)\0ok\0"
    "chargementTermine(bool)\0jouer()\0"
    "rejouer()\0pause()\0"
};

const QMetaObject SitePlayer::staticMetaObject = {
    { &QMainWindow::staticMetaObject, qt_meta_stringdata_SitePlayer,
      qt_meta_data_SitePlayer, 0 }
};

#ifdef Q_NO_DATA_RELOCATION
const QMetaObject &SitePlayer::getStaticMetaObject() { return staticMetaObject; }
#endif //Q_NO_DATA_RELOCATION

const QMetaObject *SitePlayer::metaObject() const
{
    return QObject::d_ptr->metaObject ? QObject::d_ptr->metaObject : &staticMetaObject;
}

void *SitePlayer::qt_metacast(const char *_clname)
{
    if (!_clname) return 0;
    if (!strcmp(_clname, qt_meta_stringdata_SitePlayer))
        return static_cast<void*>(const_cast< SitePlayer*>(this));
    return QMainWindow::qt_metacast(_clname);
}

int SitePlayer::qt_metacall(QMetaObject::Call _c, int _id, void **_a)
{
    _id = QMainWindow::qt_metacall(_c, _id, _a);
    if (_id < 0)
        return _id;
    if (_c == QMetaObject::InvokeMetaMethod) {
        switch (_id) {
        case 0: quit(); break;
        case 1: stop(); break;
        case 2: changementOnglet((*reinterpret_cast< int(*)>(_a[1]))); break;
        case 3: chargerPage(); break;
        case 4: changementTitre((*reinterpret_cast< const QString(*)>(_a[1]))); break;
        case 5: changementUrl((*reinterpret_cast< const QUrl(*)>(_a[1]))); break;
        case 6: actualiser(); break;
        case 7: newFile(); break;
        case 8: nouvelOnglet(); break;
        case 9: fermerOnglet(); break;
        case 10: chargementDebut(); break;
        case 11: chargementEnCours((*reinterpret_cast< int(*)>(_a[1]))); break;
        case 12: chargementTermine((*reinterpret_cast< bool(*)>(_a[1]))); break;
        case 13: jouer(); break;
        case 14: rejouer(); break;
        case 15: pause(); break;
        default: ;
        }
        _id -= 16;
    }
    return _id;
}
QT_END_MOC_NAMESPACE
