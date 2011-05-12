#-------------------------------------------------
#
# Project created by QtCreator 2011-04-27T15:23:17
#
#-------------------------------------------------

QT       += core gui webkit multimedia xml xmlpatterns network phonon

TARGET = sitePlayer
TEMPLATE = app
OBJECTS_DIR = build
MOC_DIR = build
DESTDIR = bin
UI_DIR = build

SOURCES += src/main.cpp\
        src/siteplayer.cpp

HEADERS  += src/siteplayer.h

FORMS    += ui/siteplayer.ui

OTHER_FILES += ../sitePlayer-build-desktop/www/index.html \
              ../sitePlayer-build-desktop/www/js/main.js \
              ../sitePlayer-build-desktop/www/css/style.css
