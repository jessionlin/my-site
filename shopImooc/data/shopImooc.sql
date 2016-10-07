CREATE database  if not exists 'shopImooc';
use 'shopImooc';
--管理员表
drop table if exists 'imooc_admin';
create table 'imooc_admin'(
'id' tinyint unsigned auto_increment key,
'username' varchar(20) not null unique,
'password' varchar(32) not null,
'email' varchar(50) not null
);

--分类表
drop table if exists 'imooc_cate';
create table 'imooc_cate'(
'id' smallint unsigned auto_increment key,
'cName' varchar(50) unique
);

--商品表
drop table if exists 'imooc_pro';
create table 'imooc_pro'(
'id' int unsigned auto_increment key,
'pName' varchar(50) not null unique,
'pSn' varchar(50) not null,
'pNum' int unsigned default 1,
'mPrive' decimal(10,2) not null,
'iPrice' decimal(10,2) not null,
'pDesc' text,
'pImg' varchar(50) not null,
'pubTime' int unsigned not null,
'ifShow' tinyint(1) default 1,
'ifHot' tinyint(1) default 0,
'cId' smallint unsigned not null
);

--用户表
drop table if exists 'imooc_user';
create table 'imooc_user'(
'id' int unsigned auto_increment key,
'username' varchar(20) not null unique,
'password' char(32) not null,
'sex'enum("男","女","保密")not null default "保密",
'face' varchar(50) not null ,
'regTime'int unsigned not null
);

--相册表
drop table if exists 'imooc_album';
create table 'imooc_album'(
'id' int unsigned auto_increment key,
'pid' int unsigned not null,
'albumPath' varchar(50) not null
);