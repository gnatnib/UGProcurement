# **UGProcurement**  

## :information_source: About UGProcurement  
UGProcurement is a powerful inventory management application designed to help you monitor and control your stock. With UGProcurement, you can easily track incoming and outgoing transactions, manage items effectively, and generate detailed reports.  

This application uses the **Sash Admin** template (built with Bootstrap v5) for its user interface.

---

## :sparkles: Features  
- **Dashboard**: Overview of key metrics and stock status.  
- **Jenis Barang**: Manage item categories.  
- **Satuan Barang**: Define and manage item units.  
- **Merk Barang**: Manage item brands.  
- **Barang**: Add, update, or remove items.  
- **Customer**: Manage customer data.  
- **Barang Masuk**: Record incoming stock transactions.  
- **Barang Keluar**: Record outgoing stock transactions.  
- **Laporan Barang Masuk**: Generate reports for incoming stock.  
- **Laporan Barang Keluar**: Generate reports for outgoing stock.  
- **Laporan Stok Barang**: Generate stock reports.  
- **Setting Website**: Configure website settings.  
- **Setting Hak Akses User per Role**: Define user permissions by role.  
- **Setting Menu**: Add or remove application menus.

---

## :electric_plug: Plugins  
- **Yajra Datatables**  
- **SweetAlert**  
- **jQuery**  
- **Datetime Picker**  

---

## :gear: Requirements  
![PHP](https://img.shields.io/badge/PHP-%5E8.1-green)  
![Node.js](https://img.shields.io/badge/Node%20JS-%5E16.14.0-green)  
![Npm](https://img.shields.io/badge/Npm-%5E8.3.1-green)  
![Composer](https://img.shields.io/badge/Composer-%5E2.3.9-green)  

---

## :rocket: Installation  

### :arrow_right: Clone Project / Download Files  
Clone the project using Git:  
```bash
git clone git@github.com:gnatnib/ugprocurement.git
```
Or click download zip and extract.
#### :arrow_right: Buat Database
Create database in your database viewer, for example PHPMyadmin `ugprocurement`
#### :arrow_right: Config ENV
Change file name from `env.development` to `.env`

Set `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` in `.env` file according to your database file name.

#### :arrow_right: Set Up
Open your terminal and run these codes below:
```
composer install
```
```
php artisan storage:link
```
#### :arrow_right: Import Database
Import `ugprocurement.sql` in `database/db` path to phpmyadmin 

#### :arrow_right: Jalankan Aplikasi
```
php artisan serve
```
copy & paste `http://127.0.0.1:8000/` to your browser.

#### :arrow_right: Login Default
username: `superadmin` password: `12345678`
<br>
username: `admin` password: `12345678`
<br>
username: `operator` password: `12345678`
<br>
username: `manajer` password: `12345678`
