drop database Helados;
create database Helados;
use Helados;

create table Trabajador(nombre varchar(30),
 apellido varchar(30), telefono varchar(10),
 contrasena varchar(15), id_trabajador int AUTO_INCREMENT,
 id_puesto int, eliminado int,
 primary key (id_trabajador)
);

create table Helado(
    id_helado int AUTO_INCREMENT, precio int,
    tipo_helado varchar(20), cantidad int, eliminadoh int, 
    primary key (id_helado)
);

create table Puesto(
    id_puesto int AUTO_INCREMENT, tipo_puesto varchar(20),
    primary key (id_puesto), eliminado int
);

create table Pedido(
    fecha date, hora time, subtotal int,
    total int, id_trabajador int, 
    id_pedido int AUTO_INCREMENT, 
    primary key (id_pedido), eliminado int
);

create table Cantidad(
    cantidad int, id_pedido int, id_helado int, 
    id_cantidad int AUTO_INCREMENT,
    primary key (id_cantidad)
);


ALTER TABLE Trabajador ADD FOREIGN KEY(id_puesto)
REFERENCES Puesto(id_puesto);

ALTER TABLE Pedido ADD FOREIGN KEY(id_trabajador)
REFERENCES Trabajador(id_trabajador);

ALTER TABLE Cantidad ADD FOREIGN key (id_pedido)
REFERENCES Pedido(id_pedido);

ALTER TABLE Cantidad ADD FOREIGN KEY (id_helado)
REFERENCES Helado(id_helado);

INSERT INTO Puesto (id_puesto, tipo_puesto, eliminado) 
            values (2, "Cajero", 0);

INSERT INTO Puesto (id_puesto, tipo_puesto, eliminado) 
            values (1, "Administrador", 0);

INSERT INTO Trabajador (nombre, apellido, telefono, 
            contrasena, id_trabajador, id_puesto, eliminado) 
values ("Jorge", "Davalos", "33188990",
         "giselbonita",1, 2, 0);


INSERT INTO Pedido( fecha, hora, subtotal, total, 
            id_trabajador, id_pedido, eliminado) 
            values ("2019-05-31", "02:00:00", 50, 58,
            1, 1, 0);

INSERT INTO Helado(id_helado, precio, tipo_helado, cantidad, eliminadoh) 
            values (1, 25, "Cono doble", 50, 0);

INSERT INTO Cantidad(cantidad, id_pedido, id_helado,
            id_cantidad)
            values (2, 1, 1, 1);



INSERT INTO Trabajador (nombre, apellido, telefono, 
            contrasena, id_trabajador, id_puesto, eliminado) 
values ("David", "Orozco", "33101010",
         "giselbonita",2, 1, 0);


INSERT INTO Helado (id_helado, precio, tipo_helado, cantidad, eliminadoh)
        values(2, 14, "Cono sencillo", 50, 0);

INSERT INTO Helado (id_helado, precio, tipo_helado, cantidad, eliminadoh)
        values(3, 20, "Frapuchino", 50, 0);

INSERT INTO Helado(id_helado, precio, tipo_helado, cantidad, eliminadoh)
    values(4, 10, "Paleta", 50,  0);


INSERT INTO Pedido( fecha, hora, subtotal, total, id_trabajador, id_pedido, eliminado) 
    values ("2019-06-16", "22:00:00", 60, 70, 1, 2, 0);

INSERT INTO Cantidad(cantidad, id_pedido, id_helado,
            id_cantidad)
            values (6, 2, 4, 2);

/*Agregar a trabajador con idtrabajador=5*/
INSERT INTO Pedido( fecha, hora, subtotal, total, id_trabajador, id_pedido) 
    values (curdate(), time(now()), 40, 46, 5, 3);

INSERT INTO Cantidad(cantidad, id_pedido, id_helado, id_cantidad)
 values (2, 3, 2, 3);
 
INSERT INTO Cantidad(cantidad, id_pedido, id_helado, id_cantidad)
 values (2, 1, 2, 4);



/*select helado.tipo_helado, helado.precio, cantidad.cantidad from helado 
inner join cantidad on cantidad.id_helado= helado.id_helado where eliminadoh=0;*/

/*select trabajador.nombre, cantidad.cantidad, pedido.fecha, pedido.hora, pedido.total from pedido 
inner join trabajador on trabajador.id_trabajador = pedido.id_trabajador
inner join cantidad on cantidad.id_pedido = pedido.id_pedido where pedido.fecha=curdate();*/

/*select  sum(cantidad.cantidad) from cantidad inner join pedido on cantidad.id_pedido= pedido.id_pedido where pedido.fecha <= curdate();/*

/*Mostrar select para el insert*/ /*select puesto.id_puesto from puesto inner join trabajador on puesto.id_puesto = trabajador.id_puesto; consulta para el select */ 

-- Mostrar los nombre de puesto /* select puesto.tipo_puesto from puesto inner join trabajador on puesto.id_puesto = trabajador.id_puesto;*/
select puesto.tipo_puesto, trabajador.nombre, trabajador.apellido, trabajador.telefono, trabajador.contrasena from puesto inner join trabajador on puesto.id_puesto = trabajador.id_puesto where trabajador.eliminado=0;
-- select pedido.fecha, pedido.hora, pedido.subtotal, pedido.total, pedido.id_trabajador, pedido.id_pedido, trabajador.nombre from pedido inner join trabajador on pedido.id_trabajador = trabajador.id_trabajador;
--contrario inner
select tipo_puesto from puesto where id_puesto not in(select id_puesto=1 from trabajador);
--select tipo_puesto from puesto where id_puesto not in(select id_puesto from trabajador where id_trabajador=2); select este
--consulta para select de trabajadores en pedido
select nombre from trabajador where id_trabajador not in(select id_trabajador from pedido where id_trabajador=1);