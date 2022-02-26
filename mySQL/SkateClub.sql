create database SkateClub;

drop database SkateClub;

use SkateClub;

create table if not exists cliente
(
    id_cli int unique auto_increment,
    cpf char(11) primary key not null,
    nome_cli varchar(50) not null
);

create table if not exists frete
(
    cod_regiao int primary key auto_increment,
    nome_regiao varchar(50) not null,
    taxa_frete int not null
);

create table if not exists cidade
(
    id_cid int primary key auto_increment,
    nome_cid varchar(50)
);

create table if not exists endereco
(
    id_endereco int primary key auto_increment,
    cep int not null,
    bairro varchar(50),
    lgr varchar(50),
    cod_regiao int not null,
    cpf char(11) not null,
    id_cid int not null,
    foreign key(cpf) references cliente(cpf) on delete cascade,
    foreign key(cod_regiao) references frete(cod_regiao) on delete cascade,
    foreign key(id_cid) references cidade(id_cid) on delete cascade
);

create table if not exists categoria
(
    id_categoria int primary key not null,
    nome_cat varchar(50) not null
);

create table if not exists produtos
(
    id_pro int primary key not null,
    nome_pro varchar(50),
    valor_pro int,
    qtd_pro int,
    id_categoria int not null,
    foreign key(id_categoria) references categoria(id_categoria) on delete cascade
);

create table if not exists vendas
(
    id_venda int primary key auto_increment,
    data_ven date default current_date,
    valor_ven int,
    cpf char(11) not null,
    foreign key (cpf) references cliente(cpf) on delete cascade
);

create table if not exists produto_venda
(
    id_pv_venda int not null,
    id_pv_produto int not null,
    foreign key(id_pv_venda) references vendas(id_venda) on delete cascade, 
    foreign key(id_pv_produto) references produtos(id_pro) on delete cascade,
    primary key(id_pv_venda, id_pv_produto)
);
select * from endereco;
select * from cliente;

insert into cliente(cpf, nome_cli) values ('17109786781', 'Breno');
insert into cliente(cpf, nome_cli) values ('02541132178', 'Smith');
insert into cliente(cpf, nome_cli) values ('02542032178', 'Wilson');

update cliente set nome_cli= 'Foo' where id_cli = 1;
update endereco set bairro = "Madureira" where id_endereco = 1;
update endereco set cep = 65233202 where id_endereco = 1;

insert into frete(nome_regiao, taxa_frete) 
values  ('Zona Sul', '20'),
        ('Zona Norte', '60'),
        ('Zona Oeste', '40'),
        ('Zona Leste', '80');

insert into endereco(cep, bairro, lgr, cod_regiao, cpf)
values (21170102, 'Bangu', 1130, 3, '17109786781');
insert into endereco(cep, bairro, lgr, cod_regiao, cpf)
values (20013528, 'Realengo', 50, 3, '02541132178');
insert into endereco(cep, bairro, lgr, cod_regiao, cpf)
values (25022528, 'Catete', 220, 1, '02542032178');


insert into cidade(nome_cid, id_endereco) values ('Rio de Janeiro', 1);
insert into cidade(nome_cid, id_endereco) values ('Rio de Janeiro', 4);
insert into cidade(nome_cid, id_endereco) values ('Rio de Janeiro', 5);



create or replace view cliente_data as
select

    cl.cpf CPF,
    cl.nome_cli Nome,
    c.nome_cid Cidade,
    e.cep CEP,
    e.bairro Bairro,
    e.lgr Logradouro,
    f.nome_regiao Região,
    f.taxa_frete Taxa_Frete,
    f.cod_regiao,
    e.id_endereco
from cliente cl
join endereco e 
on cl.cpf = e.cpf
join frete f
on f.cod_regiao = e.cod_regiao
join cidade c
on c.id_endereco = e.id_endereco;

select * from cliente_data;
