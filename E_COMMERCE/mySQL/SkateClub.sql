drop database SkateClub;

create database SkateClub;

use SkateClub;

create table if not exists cliente
(
    id_cli int primary key unique auto_increment,
    cpf char(11) not null,
    nome_cli varchar(50) not null
);

create table if not exists regiao
(
    cod_regiao int primary key auto_increment,
    nome_regiao varchar(50) not null
);

create table if not exists bairro
(
    id_bairro int primary key auto_increment,
    nome_bairro varchar(50),
    cod_regiao int not null,
    foreign key(cod_regiao) references regiao(cod_regiao) on delete cascade
);

create table if not exists endereco
(
    id_endereco int primary key auto_increment,
    cep int not null,
    lgr int,
    id_cli int not null,
    id_bairro int,
    foreign key(id_cli) references cliente(id_cli) on delete cascade,
    foreign key(id_bairro) references bairro(id_bairro) on delete cascade
);

create table if not exists categoria
(
    id_categoria int primary key auto_increment not null,
    nome_cat varchar(50) not null
);

create table if not exists produtos
(
    id_pro int primary key auto_increment not null,
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
    id_cli int not null,
    foreign key (id_cli) references cliente(id_cli) on delete cascade
);

create table if not exists produto_venda
(
    id_pv_venda int not null,
    id_pv_produto int not null,
    qnt_venda int,
    foreign key(id_pv_venda) references vendas(id_venda) on delete cascade, 
    foreign key(id_pv_produto) references produtos(id_pro) on delete cascade,
    primary key(id_pv_venda, id_pv_produto)
);


--------------------------------------  Inserts --------------------------------------

insert into regiao(nome_regiao) 
values  ('Zona Sul'),
        ('Zona Norte'),
        ('Zona Oeste'),
        ('Zona Central');

insert into bairro(nome_bairro, cod_regiao) 
values  ('Campo Grande', 3),
        ('Jardim Sulacap', 3),
        ('Realengo', 3),
        ('Jacarepaguá', 3),
        ('Recreio dos Bandeirantes', 3),
        ('Alto da Boa Vista', 2),
        ('Tijuca', 2),
        ('Maracanã', 2),
        ('Riachuelo', 2),
        ('Méier', 2),
        ('São Conrado', 1),
        ('Botafogo', 1),
        ('Catete', 1),
        ('Copacabana', 1),
        ('Laranjeiras', 1),
        ('Estácio', 4),
        ('Benfica', 4),
        ('Caju', 4),
        ('Catumbi', 4),
        ('Rio Comprido', 4);

insert into cliente(cpf, nome_cli) values
('17109786781', 'Breno'),
('83339449732', 'Smith'),
('97894283754', 'Wilson');


insert into endereco(cep, lgr, id_cli, id_bairro) values
(21170102, 1130, 1, 1),
(21650004, 2100, 2, 4),
(21041410, 300, 3, 2);


insert into categoria(nome_cat) values 
("Shapes"),
("Vestuário"),
("Acessórios");

insert into produtos(nome_pro, valor_pro, qtd_pro, id_categoria) values
("Shape Element Can. 8.25", 249.90, 20, 1),
("Shape Santa Cruz", 219.90, 22, 1),
("Shape Zero Maple Thomas", 279.00, 33, 1),
("Shape Maple Creature 8.25", 268.90, 34, 1),
("Shape 5Boro LetterPress 8.23", 118.90, 38, 1),
("Shape Element Maple 8.5", 299.90, 18, 1),
("Shape Iron Maiden 'Killers' Street", 280.90, 14, 1),
("Shape Iron Maiden 'Number Of the Beast'", 250.90, 16, 1),
("Shape Iron Maiden 'Live After Death'", 270.90, 20, 1),
("Shape Offspring 'The Offspring'", 210.90, 13, 1),
("Shape MotorHead 'Ace of Spades'", 299.90, 25, 1),
("Shape Millencolin 'Plate'", 250.90, 27, 1),
("Camisa Trasher", 189.90, 80, 2),
("Camisa Colcci Skate", 159.90, 55, 2),
("Camisa Urgh Skate", 135.00, 62, 2),
("Boné Trasher Preto", 55.00, 66, 2),
("Camisa SK8 Branca", 90.00, 50, 2),
("Calça DC Cargo", 180.00, 36, 2),
("Tênis Skate Qix Branco", 210.00, 42, 2),
("Tênis Skate Qix Sport", 190.00, 22, 2),
("SapaTênis Caballero Social", 298.00, 40, 2),
("Camisa URGH Social", 188.00, 51, 2),
("Moletom Verde Marrom", 208.00, 49, 2),
("Moletom Venture Camuflado", 218.00, 39, 2),
("Capacete Kraft Inglaterra", 229.90, 28, 3),
("Capacete Alva Preto", 199.90, 33, 3),
("Capacete Solo Decks", 119.90, 41, 3),
("Joelheira Niggli Pads", 329.90, 30, 3),
("Joelheira Narina Skate", 249.90, 36, 3),
("Joelheira Tracker Preta", 329.90, 39, 3),
("Rodas Black Sheep 55mm/90A", 119.90, 60, 3),
("Rodas Black Sheep 53mm/97A White", 109.90, 43, 3),
("Rodas Black Sheep 53mm/97A Orange", 122.90, 35, 3),
("Carteira Santa Cruz", 150.00, 25, 3),
("Corrente com Pingente Skate", 200.00, 52, 3),
("Truck Fun Light 139mm", 168.00, 41, 3),
("Truck Fun Light Preto 139mm", 170.00, 29, 3);

insert into vendas(valor_ven, id_cli) values 
(510.00, 1),
(616.00, 2),
(419.90, 3);

insert into produto_venda values (1, 1, 1), (1, 2, 2);
insert into produto_venda values (2, 10, 1), (2, 11, 1), (2, 20, 2);
insert into produto_venda values (3, 6, 1), (3, 15, 1);

select * from endereco;
select * from cliente;
select * from regiao;
select * from bairro;
select * from categoria;
select * from produtos;
select * from vendas;
select * from produto_venda;


--------------------------------------  Views  --------------------------------------

create or replace view cliente_data as
select
    cl.id_cli,
    cl.cpf CPF,
    cl.nome_cli Nome,
    b.nome_bairro Bairro,
    r.nome_regiao Região,
    e.lgr Logradouro,
    e.cep CEP

from cliente cl
join endereco e 
on cl.id_cli = e.id_cli
join bairro b
on b.id_bairro = e.id_bairro
join regiao r
on r.cod_regiao = b.cod_regiao
ORDER BY cl.id_cli;


create or replace view info_venda as
select

    v.id_venda,
    cl.cpf CPF,
    cl.nome_cli Nome,
    v.data_ven Data_Venda,
    v.valor_ven Valor_Venda,
    pv.qnt_venda Quantidade,
    p.nome_pro Produto

from cliente cl
join vendas v 
on cl.id_cli = v.id_cli
join produto_venda pv
on pv.id_pv_venda = v.id_venda 
join produtos p
on p.id_pro = pv.id_pv_produto
ORDER BY v.id_venda;


create or replace view info_produtos as
select
    p.id_pro,
    c.nome_cat Categoria,
    p.nome_pro Produto,
    p.valor_pro Valor,
    p.qtd_pro Estoque

from categoria c
join produtos p 
on c.id_categoria = p.id_categoria
ORDER BY p.id_pro;


delete from cliente where id_cli = 4;

select * from cliente_data;
select * from info_venda;
select * from info_produtos;

