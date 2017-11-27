create user deknappe identified by deknappe;
grant connect, all privileges, dba to deknappe;


create table REMEDI (
id_REMEDI varchar2(3) constraint pk_REMEDI primary key,
REMEDI varchar2(25)
);

create table siswa (
id_siswa char(15) constraint pk_siswa primary key,
password varchar2(30),
nama_siswa varchar2(30),
jurusan varchar(10), 
kelas varchar2(10),
alamat_siswa varchar2(30),
tempat_lahir varchar(25),
tanggal_lahir date,
gender_siswa varchar2(30),
no_telp varchar2(16),
foto_siswa varchar2(50)
);

create table mapel (
id_mapel varchar2(3) constraint pk_mapel primary key,
nama_mapel varchar2(15),
jurusan varchar2(3),
kkm number(3)
);

create table soal (
no_soal number(5) constraint pk_soal primary key,
id_mapel varchar2(3),
kelas varchar2(2),
id_REMEDI varchar2(3),
soal varchar2(200),
pil_a varchar2(200),
pil_b varchar2(200),
pil_c varchar2(200),
pil_d varchar2(200),
jawaban varchar2(3),
constraint fk_mapel foreign key(id_mapel) references mapel on delete cascade
);

CREATE SEQUENCE soal_seq START WITH 1;
CREATE OR REPLACE TRIGGER soal_bir 
BEFORE INSERT ON soal
FOR EACH ROW

BEGIN
  SELECT soal_seq.NEXTVAL
  INTO   :new.no_soal
  FROM   dual;
END;
/


create table nilai(
id_nilai number(5) constraint pk_nilai primary key,
id_siswa char(15),
id_mapel varchar2(3),
id_REMEDI varchar2(3),
nilai number(3),
constraint fk_siswa foreign key(id_siswa) references siswa on delete cascade, 
constraint fk_mapel2 foreign key(id_mapel) references mapel on delete cascade,
constraint fk_REMEDI foreign key(id_REMEDI) references REMEDI on delete cascade 
);

CREATE SEQUENCE nilai_seq START WITH 1;
CREATE OR REPLACE TRIGGER nilai_bir 
BEFORE INSERT ON nilai
FOR EACH ROW

BEGIN
  SELECT nilai_seq.NEXTVAL
  INTO   :new.id_nilai
  FROM   dual;
END;
/

create table guru(
id_guru char(20) constraint pk_guru primary key,
password varchar2(30),
nama_guru varchar2(30),
alamat_guru varchar2(30),
gender_guru varchar2(30),
telp_guru varchar2(16),
email_guru varchar2(30),
id_mapel varchar2(3),
foto_guru varchar2(50),
constraint fk_mapel3 foreign key(id_mapel) references mapel on delete cascade
);

CREATE TABLE set_remedi (
  id_set_remedi number(5) constraint pk_set_remedi primary key,
  kode_remedi varchar(25),
  id_mapel varchar(3),
  id_remedi varchar(4),
  kelas number(3),
  jam_mulai number(4),
  menit_mulai number(4),
  durasi number(4),
  tanggal date
); 

CREATE SEQUENCE set_remedi_seq START WITH 1;
CREATE OR REPLACE TRIGGER set_remedi_bir 
BEFORE INSERT ON set_remedi
FOR EACH ROW

BEGIN
  SELECT set_remedi_seq.NEXTVAL
  INTO   :new.id_set_remedi
  FROM   dual;
END;
/







//insert tabel mapel
INSERT INTO mapel VALUES ('FIS', 'Fisika','MIA');
INSERT INTO mapel VALUES ('BIO', 'Biologi','MIA');
INSERT INTO mapel VALUES ('BIN', 'B.Indonesia','ALL');
INSERT INTO mapel VALUES ('BIG', 'B.Inggris','ALL');
INSERT INTO mapel VALUES ('KIM', 'Kimia','MIA');
INSERT INTO mapel VALUES ('MAT', 'Matematika','ALL');
INSERT INTO mapel VALUES ('SOS', 'Sosiologi','IIS');
INSERT INTO mapel VALUES ('EKO', 'Ekonomi','IIS');
INSERT INTO mapel VALUES ('GEO', 'Geografi','IIS');

/insert tabel remedi
INSERT INTO remedi VALUES ('UH1', 'Ulangan Harian 1');
INSERT INTO remedi VALUES ('UH2', 'Ulangan Harian 2');
INSERT INTO remedi VALUES ('UTS', 'Ulangan Tengah Semester');
INSERT INTO remedi VALUES ('UAS', 'Ulangan Akhir Semester');

INSERT INTO guru VALUES ('1111', '1111', 'Gatot, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'MAT', 'G1.png');
INSERT INTO guru VALUES ('2222', '2222', 'Dadang, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'BIN', 'G1.png');
INSERT INTO guru VALUES ('3333', '3333', 'Udin, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'BIG', 'G1.png');
INSERT INTO guru VALUES ('4444', '4444', 'Doyok, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'FIS', 'G1.png');
INSERT INTO guru VALUES ('5555', '5555', 'Torik, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'KIM', 'G1.png');
INSERT INTO guru VALUES ('6666', '6666', 'Bimo, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'BIO', 'G1.png');

//soal bahasa inggris 
INSERT INTO soal VALUES ('','BIG','10','UAS','Apa itu bahasainggris ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','BIG','10','UAS','Apa kepanjangan b.ing?','Pelajaran','Ilmu','bahasainggris','Jajan','c');
INSERT INTO soal VALUES ('','BIG','10','UAS','berapa nilai bahasa inggris ?','Pelajaran','Ilmu','Makanan','seratus','d');
INSERT INTO soal VALUES ('','BIG','10','UH1','Apa itu bahasainggris ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','BIG','10','UH1','Apa itu bahasainggris ?','Pelajaran','Ilmu','Makanan','Jajan','b');
INSERT INTO soal VALUES ('','BIG','10','UH1','Apa itu bahasainggris ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','BIG','10','UH2','Apa itu bahasainggris ?','Pelajaran','Ilmu','Makanan','Jajan','b');
INSERT INTO soal VALUES ('','BIG','10','UH2','Apa itu bahasainggris ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','BIG','10','UH2','Apa itu bahasainggris ?','Pelajaran','Ilmu','Makanan','Jajan','c');
INSERT INTO soal VALUES ('','BIG','10','UTS','Apa itu bahasainggris ?','Pelajaran','Ilmu','Makanan','Jajan','b');
INSERT INTO soal VALUES ('','BIG','10','UTS','Apa itu bahasainggris ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','BIG','10','UTS','Apa itu bahasainggris ?','Pelajaran','Ilmu','Makanan','Jajan','a');

//soal bahasa indonesia 
INSERT INTO soal VALUES ('','BIN','10','UAS','Apa itu bahasaindonesia ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','BIN','10','UAS','Apa itu bahasaindonesia ?','Pelajaran','Ilmu','Makanan','Jajan','c');
INSERT INTO soal VALUES ('','BIN','10','UAS','Apa itu bahasaindonesia ?','Pelajaran','Ilmu','Makanan','Jajan','b');
INSERT INTO soal VALUES ('','BIN','10','UH1','Apa itu bahasaindonesia ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','BIN','10','UH1','Apa itu bahasaindonesia ?','Pelajaran','Ilmu','Makanan','Jajan','c');
INSERT INTO soal VALUES ('','BIN','10','UH1','Apa itu bahasaindonesia ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','BIN','10','UH2','Apa itu bahasaindonesia ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','BIN','10','UH2','Apa itu bahasaindonesia ?','Pelajaran','Ilmu','Makanan','Jajan','b');
INSERT INTO soal VALUES ('','BIN','10','UH2','Apa itu bahasaindonesia ?','Pelajaran','Ilmu','Makanan','Jajan','c');
INSERT INTO soal VALUES ('','BIN','10','UTS','Apa itu bahasaindonesia ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','BIN','10','UTS','Apa itu bahasaindonesia ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','BIN','10','UTS','Apa itu bahasaindonesia ?','Pelajaran','Ilmu','Makanan','Jajan','b');

//soal biologi 
INSERT INTO soal VALUES ('','BIO','10','UAS','Apa itu Biologi ?','Pelajaran','Ilmu','Makanan','Jajan','c');
INSERT INTO soal VALUES ('','BIO','10','UAS','Apa itu Biologi ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','BIO','10','UAS','Apa itu Biologi ?','Pelajaran','Ilmu','Makanan','Jajan','b');
INSERT INTO soal VALUES ('','BIO','10','UH1','Apa itu Biologi ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','BIO','10','UH1','Apa itu Biologi ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','BIO','10','UH1','Apa itu Biologi ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','BIO','10','UH2','Apa itu Biologi ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','BIO','10','UH2','Apa itu Biologi ?','Pelajaran','Ilmu','Makanan','Jajan','c');
INSERT INTO soal VALUES ('','BIO','10','UH2','Apa itu Biologi ?','Pelajaran','Ilmu','Makanan','Jajan','c');
INSERT INTO soal VALUES ('','BIO','10','UTS','Apa itu Biologi ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','BIO','10','UTS','Apa itu Biologi ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','BIO','10','UTS','Apa itu Biologi ?','Pelajaran','Ilmu','Makanan','Jajan','c');

//soal ekonomi
INSERT INTO soal VALUES ('','EKO','10','UAS','Apa itu ekonomi ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','EKO','10','UAS','Apa itu ekonomi ?','Pelajaran','Ilmu','Makanan','Jajan','c');
INSERT INTO soal VALUES ('','EKO','10','UAS','Apa itu ekonomi ?','Pelajaran','Ilmu','Makanan','Jajan','b');
INSERT INTO soal VALUES ('','EKO','10','UH1','Apa itu ekonomi ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','EKO','10','UH1','Apa itu ekonomi ?','Pelajaran','Ilmu','Makanan','Jajan','b');
INSERT INTO soal VALUES ('','EKO','10','UH1','Apa itu ekonomi ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','EKO','10','UH2','Apa itu ekonomi ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','EKO','10','UH2','Apa itu ekonomi ?','Pelajaran','Ilmu','Makanan','Jajan','c');
INSERT INTO soal VALUES ('','EKO','10','UH2','Apa itu ekonomi ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','EKO','10','UTS','Apa itu ekonomi ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','EKO','10','UTS','Apa itu ekonomi ?','Pelajaran','Ilmu','Makanan','Jajan','c');
INSERT INTO soal VALUES ('','EKO','10','UTS','Apa itu ekonomi ?','Pelajaran','Ilmu','Makanan','Jajan','d');

//soal fisika 
INSERT INTO soal VALUES ('','FIS','10','UAS','Apa itu fisika ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','FIS','10','UAS','Apa itu fisika ?','Pelajaran','Ilmu','Makanan','Jajan','b');
INSERT INTO soal VALUES ('','FIS','10','UAS','Apa itu fisika ?','Pelajaran','Ilmu','Makanan','Jajan','c');
INSERT INTO soal VALUES ('','FIS','10','UH1','Apa itu fisika ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','FIS','10','UH1','Apa itu fisika ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','FIS','10','UH1','Apa itu fisika ?','Pelajaran','Ilmu','Makanan','Jajan','b');
INSERT INTO soal VALUES ('','FIS','10','UH2','Apa itu fisika ?','Pelajaran','Ilmu','Makanan','Jajan','c');
INSERT INTO soal VALUES ('','FIS','10','UH2','Apa itu fisika ?','Pelajaran','Ilmu','Makanan','Jajan','b');
INSERT INTO soal VALUES ('','FIS','10','UH2','Apa itu fisika ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','FIS','10','UTS','Apa itu fisika ?','Pelajaran','Ilmu','Makanan','Jajan','c');
INSERT INTO soal VALUES ('','FIS','10','UTS','Apa itu fisika ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','FIS','10','UTS','Apa itu fisika ?','Pelajaran','Ilmu','Makanan','Jajan','b');

//soal geografi
INSERT INTO soal VALUES ('','GEO','10','UAS','Apa itu geografi ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','GEO','10','UAS','Apa itu geografi ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','GEO','10','UAS','Apa itu geografi ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','GEO','10','UH1','Apa itu geografi ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','GEO','10','UH1','Apa itu geografi ?','Pelajaran','Ilmu','Makanan','Jajan','b');
INSERT INTO soal VALUES ('','GEO','10','UH1','Apa itu geografi ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','GEO','10','UH2','Apa itu geografi ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','GEO','10','UH2','Apa itu geografi ?','Pelajaran','Ilmu','Makanan','Jajan','b');
INSERT INTO soal VALUES ('','GEO','10','UH2','Apa itu geografi ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','GEO','10','UTS','Apa itu geografi ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','GEO','10','UTS','Apa itu geografi ?','Pelajaran','Ilmu','Makanan','Jajan','b');
INSERT INTO soal VALUES ('','GEO','10','UTS','Apa itu geografi ?','Pelajaran','Ilmu','Makanan','Jajan','c');

//soal kimia
INSERT INTO soal VALUES ('','KIM','10','UAS','Apa itu kimia ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','KIM','10','UAS','Apa itu kimia ?','Pelajaran','Ilmu','Makanan','Jajan','c');
INSERT INTO soal VALUES ('','KIM','10','UAS','Apa itu kimia ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','KIM','10','UH1','Apa itu kimia ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','KIM','10','UH1','Apa itu kimia ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','KIM','10','UH1','Apa itu kimia ?','Pelajaran','Ilmu','Makanan','Jajan','b');
INSERT INTO soal VALUES ('','KIM','10','UH2','Apa itu kimia ?','Pelajaran','Ilmu','Makanan','Jajan','b');
INSERT INTO soal VALUES ('','KIM','10','UH2','Apa itu kimia ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','KIM','10','UH2','Apa itu kimia ?','Pelajaran','Ilmu','Makanan','Jajan','b');
INSERT INTO soal VALUES ('','KIM','10','UTS','Apa itu kimia ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','KIM','10','UTS','Apa itu kimia ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','KIM','10','UTS','Apa itu kimia ?','Pelajaran','Ilmu','Makanan','Jajan','b');

//soal matematika
INSERT INTO soal VALUES ('','MAT','10','UAS','Apa itu matematika ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','MAT','10','UAS','Apa itu matematika ?','Pelajaran','Ilmu','Makanan','Jajan','c');
INSERT INTO soal VALUES ('','MAT','10','UAS','Apa itu matematika ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','MAT','10','UH1','Apa itu matematika ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','MAT','10','UH1','Apa itu matematika ?','Pelajaran','Ilmu','Makanan','Jajan','c');
INSERT INTO soal VALUES ('','MAT','10','UH1','Apa itu matematika ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','MAT','10','UH2','Apa itu matematika ?','Pelajaran','Ilmu','Makanan','Jajan','b');
INSERT INTO soal VALUES ('','MAT','10','UH2','Apa itu matematika ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','MAT','10','UH2','Apa itu matematika ?','Pelajaran','Ilmu','Makanan','Jajan','b');
INSERT INTO soal VALUES ('','MAT','10','UTS','Apa itu matematika ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','MAT','10','UTS','Apa itu matematika ?','Pelajaran','Ilmu','Makanan','Jajan','c');
INSERT INTO soal VALUES ('','MAT','10','UTS','Apa itu matematika ?','Pelajaran','Ilmu','Makanan','Jajan','a');

/soal sosiologi
INSERT INTO soal VALUES ('','SOS','10','UAS','Apa itu sosiologi ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','SOS','10','UAS','Apa itu sosiologi ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','SOS','10','UAS','Apa itu sosiologi ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','SOS','10','UH1','Apa itu sosiologi ?','Pelajaran','Ilmu','Makanan','Jajan','c');
INSERT INTO soal VALUES ('','SOS','10','UH1','Apa itu sosiologi ?','Pelajaran','Ilmu','Makanan','Jajan','b');
INSERT INTO soal VALUES ('','SOS','10','UH1','Apa itu sosiologi ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','SOS','10','UH2','Apa itu sosiologi ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','SOS','10','UH2','Apa itu sosiologi ?','Pelajaran','Ilmu','Makanan','Jajan','d');
INSERT INTO soal VALUES ('','SOS','10','UH2','Apa itu sosiologi ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','SOS','10','UTS','Apa itu sosiologi ?','Pelajaran','Ilmu','Makanan','Jajan','a');
INSERT INTO soal VALUES ('','SOS','10','UTS','Apa itu sosiologi ?','Pelajaran','Ilmu','Makanan','Jajan','c');
INSERT INTO soal VALUES ('','SOS','10','UTS','Apa itu sosiologi ?','Pelajaran','Ilmu','Makanan','Jajan','a');


//ASESSTMENT 2

a. fungsional aplikasi :
    1. insert
        INSERT INTO mapel VALUES ('BIG', 'B.Inggris','ALL');
        INSERT INTO remedi VALUES ('UAS', 'Ulangan Akhir Semester');
        INSERT INTO guru VALUES ('1111', '1111', 'Gatot, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'MAT', 'G1.png');

    2. view
        //Untuk mengecek User guru
        SELECT * from guru where id_guru='$cek';
        select * from siswa;

    3. update
        UPDATE `soal` SET `kelas`= $kelas, `soal`="$soal",`pil_a`="$a",`pil_b`="$b",`pil_c`="$c",`pil_d`="$d",`jawaban`="$jawaban" WHERE no_soal = $no;

    4. delete
      //untuk delete
      delete from siswa where id_siswa = '$id';
      

b. modifikasi form
    1. add/remove field di aplikasi
        //Untuk Insert soal field
        insert into soal values('','$t_mapel','$kelas','$remedi','$soal','$pil_a','$pil_b','$pil_c','$pil_d','$jawaban');
        delete from soal where no_soal = $no;

    2. add/remove attribute di tabel
       alter table [nama table] add [nama colom] [tipe colom];
	//alter table soal add jenis varchar(20);
       alter table [nama table] drop column [nama colom];
	//alter table soal drop column jenis;

c. modifikasi report
    1. add/remove kolom di aplikasi
       alter table [nama table] add [nama colom] [tipe colom];
	//alter table soal add jenis varchar(20);
       alter table [nama table] drop column [nama colom];
	//alter table soal drop column jenis;

    2. add/remove attribute di tabel
       alter table [nama table] add [nama colom] [tipe colom];
	//alter table soal add jenis varchar(20);
       alter table [nama table] drop column [nama colom];
	//alter table soal drop column jenis;

    3. join table
        //untuk menampilkan soal
        select * from soal natural join remedi;

    4. searching pada aplikasi
        //untuk view soal dan search soal
        select * from soal where id_remedi='$remedi' AND id_mapel='$mapel' AND kelas='$kelas';


d. penggunaan fungsi pada aplikasi


e. penggunaan procedure pada aplikasi




select nama_mapel, remedi from soal join mapel on soal.id_mapel = mapel.id_mapel join remedi on soal.id_remedi = remedi.id_remedi where id_mapel = 'BIG'; 