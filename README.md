# **UGProcurement**  

## :information_source: About UGProcurement  
UGProcurement is a powerful inventory management application designed to help you monitor and control your stock. With UGProcurement, you can easily track incoming and outgoing transactions, manage items effectively, and generate detailed reports.  

This application uses the **Sash Admin** template (built with Bootstrap v5) for its user interface.

---


## :gear: Requirements  
![Laravel Version](https://img.shields.io/badge/Laravel-9.52.18-red.svg)
![npm Version](https://img.shields.io/badge/npm-11.0.0-red.svg)
![Composer Version](https://img.shields.io/badge/Composer-2.8.4-yellow.svg)
![PHP Version](https://img.shields.io/badge/PHP-8.3.6-blue.svg)
![Node.Js Version](https://img.shields.io/badge/Node.js-20.17.0-green.svg)


---

## :sparkles: Features  
- **Dashboard**: Overview of key metrics and stock status.  
- **Jenis Barang**: Manage item categories.  
- **Satuan Barang**: Define and manage item units.  
- **Merk Barang**: Manage item brands.  
- **Barang**: Add, update, or remove items.  
- **Customer**: Manage customer data.  
- **Barang Masuk**: Record incoming stock transactions.  
- **Laporan Barang Masuk**: Generate reports for incoming stock.  
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
#### :arrow_right: Seed Database
```
php artisan migrate:fresh --seed
```

#### :arrow_right: Jalankan Aplikasi
```
php artisan serve
```
copy & paste `http://127.0.0.1:8000/` to your browser.
