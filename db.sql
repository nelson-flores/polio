/*
 * Counter
 */

drop database if exists xcounter;
create database xcounter;
use xcounter;


create table if not exists users(
    id bigint not null auto_increment primary key,
    name varchar(300) null,
    username varchar(300) not null unique,
    password varchar(200) null,
    created_at datetime null default current_timestamp,
    updated_at datetime null,
    deleted_at datetime null
);

create table if not exists counter(
    id bigint not null auto_increment primary key,
    user_id bigint not null,
    name varchar(300) null,
    value int null default 0,
    created_at datetime null default current_timestamp,
    updated_at datetime null,
    deleted_at datetime null,
    foreign key (user_id) references users(id) on delete cascade
);