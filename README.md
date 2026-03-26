# Access Control System

🇬🇧 English below

## 📌 Áttekintés

Az Access Control System egy Laravel alapú webalkalmazás, amely egy egyszerű beléptető rendszer működését modellezi.

A rendszer célja a dolgozók, munkakörök és helyiségek kezelésének támogatása, valamint annak nyilvántartása, hogy ki melyik szobához férhet hozzá, illetve milyen belépési események történtek.

---

## 🚀 Fő funkciók

- Felhasználói hitelesítés
- Dolgozók listázása, módosítása és törlése
- Munkakörök kezelése
- Szobák kezelése
- Szobákhoz tartozó belépési előzmények megjelenítése
- Jogosultság alapú hozzáférés bizonyos műveletekhez
- Főoldali statisztikák a rendszerben szereplő dolgozókról és szobákról

---

## 🧠 Kiemelt technikai megoldások

- Laravel alapú MVC felépítés
- Eloquent modellek és relációk használata
- Beépített autentikáció Laravel Breeze segítségével
- SQLite alapú helyi adatbázis
- CRUD műveletek több entitásra
- Admin jogosultság ellenőrzése bizonyos műveleteknél

---

## 🛠 Technológiák

- PHP
- Laravel
- Blade
- SQLite
- Tailwind CSS
- Vite

---

## 📁 Főbb entitások

- User – dolgozók/felhasználók
- Position – munkakörök
- Room – helyiségek
- UserRoomEntry – belépési események

---

## ⚙️ Futtatás

### 1. Függőségek telepítése

composer install
npm install

### 2. Környezeti változók beállítása

Másold le az `.env.example` fájlt `.env` néven, majd állítsd be a szükséges értékeket.

### 3. Alkalmazás kulcs generálása

php artisan key:generate

### 4. Adatbázis migráció

php artisan migrate

### 5. Seeder futtatása

php artisan db:seed

### 6. Frontend build vagy fejlesztői mód

npm run dev

### 7. Laravel indítása

php artisan serve

---

## 🎯 Projekt célja

A projekt egy beléptető rendszer alapjainak modellezésére készült, ahol a hangsúly az adatszerkezeteken, a relációkon, a jogosultságkezelésen és az adminisztrációs felületeken van.

---

## 📄 Megjegyzés

A projekt egyetemi feladatként készült, de jól bemutatja egy Laravel alapú adminisztrációs rendszer és egy egyszerű hozzáférés-kezelési logika megvalósítását.

---

## 🇬🇧 English

## 📌 Overview

Access Control System is a Laravel-based web application that models the core functionality of a simple entry management system.

The goal of the project is to manage employees, positions, and rooms, while also keeping track of room access history and access-related records.

---

## 🚀 Main Features

- User authentication
- Employee listing, editing, and deletion
- Position management
- Room management
- Room entry history display
- Permission-based access to certain actions
- Homepage statistics for users and rooms

---

## 🧠 Key Technical Highlights

- Laravel MVC architecture
- Eloquent models and relationships
- Built-in authentication with Laravel Breeze
- Local SQLite database
- CRUD operations across multiple entities
- Admin authorization checks for protected actions

---

## 🛠 Technologies

- PHP
- Laravel
- Blade
- SQLite
- Tailwind CSS
- Vite

---

## 📁 Main Entities

- User – employees/users
- Position – job roles
- Room – rooms
- UserRoomEntry – entry events

---

## ⚙️ Running the project

### 1. Install dependencies

composer install
npm install

### 2. Configure environment variables

Copy `.env.example` to `.env` and set the required values.

### 3. Generate application key

php artisan key:generate

### 4. Run migrations

php artisan migrate

### 5. Run seeders

php artisan db:seed

### 6. Start frontend build/dev mode

npm run dev

### 7. Start Laravel server

php artisan serve

---

## 🎯 Purpose

The project was created to model the foundations of an access control system, focusing on data structures, entity relationships, authorization, and administration features.

---

## 📄 Notes

This project was developed as a university assignment, but it also demonstrates the implementation of a Laravel-based admin system and a simple access control workflow.
