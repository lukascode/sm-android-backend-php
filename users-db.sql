drop database if exists sm_android_users;
create database sm_android_users;

use sm_android_users;

create table users
(
	id integer not null primary key auto_increment,
    login varchar(50) not null unique,
    password varchar(50) not null,
    avatar varchar(256),
    nationality varchar(50),
    skills text,
    aboutme text
);

create table messages
(
	id integer not null primary key auto_increment,
    id_sender integer not null,
    id_receiver integer not null,
    message text,
    constraint fk_message_id_sender foreign key(id_sender) references users(id) on delete cascade,
    constraint fk_messagee_id_receiver foreign key(id_receiver) references users(id) on delete cascade
);

alter table messages add column ts timestamp default current_timestamp;

insert into users(id, login, password, avatar, nationality, skills, aboutme) 
values
(null, "lukas", "alamakota", "dsdfa", "Poland", "C++ C# Java", "blablabal"),
(null, "neo", "neo123", "dsdfa", "Poland", "C ASM/NASM", "blablabal"),
(null, "olaf", "gregory", "qwert", "Germany", "C++ C# Java", "fsdfs"),
(null, "beznr", "gskeg", "dsdfa", "Poland", "C++ C# Java", "blablabal"),
(null, "MRX", "aoqirkcsg", "dsdfa", "Poland", "C++ C# Java", "blablabal");

insert into messages(id, id_sender, id_receiver, message) 
values
(null, 4, 5, "Hello . How are you"),
(null, 4, 6, "Hi I have a question for you");
