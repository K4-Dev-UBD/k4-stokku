create table barang
(
product_id char(16) NOT NULL,
product_name text,
stock int NULL,
price int NULL,
asal text NULL,
jenis text NULL,
expired char(10) NULL,
tanggal_beli char(10) NULL,
deskripsi text NULL,
harga_jual int NULL,
created_date char(10) NULL,
updated_date char(10) NULL,
gambar text NULL
PRIMARY KEY (product_id)
)

create table jenis_barang (
nama text (16) NOT NULL
PRIMARY KEY (nama)
)