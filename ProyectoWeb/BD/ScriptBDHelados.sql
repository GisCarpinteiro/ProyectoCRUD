reate database Helados;
use Helados;

create table Trabajador(nombre varchar(30),
 apellido varchar(30), telefono varchar(10),
 contrasena varchar(15), id_trabajador int,
 id_puesto int, eliminado int,
 primary key (id_trabajador)
);

create table Helado(
    id_helado int, precio int,
    tipo_helado varchar(20), cantidad int, eliminadoh int, 
    primary key (id_helado)
);

create table Puesto(
    id_puesto int, tipo_puesto varchar(20),
    primary key (id_puesto)
);

create table Pedido(
    fecha date, hora time, subtotal int,
    total int, id_trabajador int, 
    id_pedido int, 
    primary key (id_pedido)
);

create table Cantidad(
    cantidad int, id_pedido int, id_helado int, 
    id_cantidad int,
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

INSERT INTO Puesto (id_puesto, tipo_puesto) 
            values (2, "Cajero");

INSERT INTO Puesto (id_puesto, tipo_puesto) 
            values (1, "Administrador");

INSERT INTO Trabajador (nombre, apellido, telefono, 
            contrasena, id_trabajador, id_puesto, eliminado) 
values ("Jorge", "Davalos", "33188990",
         "giselbonita",1, 2, 0);


INSERT INTO Pedido( fecha, hora, subtotal, total, 
            id_trabajador, id_pedido) 
            values ("2019-05-31", "02:00:00", 50, 58,
            1, 1);

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


INSERT INTO Pedido( fecha, hora, subtotal, total, id_trabajador, id_pedido) 
    values ("2019-06-16", "22:00:00", 60, 70, 1, 2);

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
