create user deknappe identified by deknappe;
grant connect, all privileges, dba, resource to deknappe;

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



-- insert tabel mapel
INSERT INTO mapel VALUES ('FIS', 'Fisika','MIA',60);
INSERT INTO mapel VALUES ('BIO', 'Biologi','MIA',60);
INSERT INTO mapel VALUES ('BIN', 'B.Indonesia','ALL',60);
INSERT INTO mapel VALUES ('BIG', 'B.Inggris','ALL',60);
INSERT INTO mapel VALUES ('KIM', 'Kimia','MIA',60);
INSERT INTO mapel VALUES ('MAT', 'Matematika','ALL',60);
INSERT INTO mapel VALUES ('SOS', 'Sosiologi','IIS',60);
INSERT INTO mapel VALUES ('EKO', 'Ekonomi','IIS',60);
INSERT INTO mapel VALUES ('GEO', 'Geografi','IIS',60);


-- insert tabel remedi
INSERT INTO remedi VALUES ('UH1', 'Ulangan Harian 1');
INSERT INTO remedi VALUES ('UH2', 'Ulangan Harian 2');
INSERT INTO remedi VALUES ('UTS', 'Ulangan Tengah Semester');
INSERT INTO remedi VALUES ('UAS', 'Ulangan Akhir Semester');


-- insert tabel guru
INSERT INTO guru VALUES ('1111', '1111', 'Gatot, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'MAT', 'G1.png');
INSERT INTO guru VALUES ('2222', '2222', 'Dadang, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'BIN', 'G1.png');
INSERT INTO guru VALUES ('3333', '3333', 'Udin, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'BIG', 'G1.png');
INSERT INTO guru VALUES ('4444', '4444', 'Doyok, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'FIS', 'G1.png');
INSERT INTO guru VALUES ('5555', '5555', 'Torik, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'KIM', 'G1.png');
INSERT INTO guru VALUES ('6666', '6666', 'Bimo, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'BIO', 'G1.png');


