-- FORMTO FECHA: YYYY-MM-DD

-- Consulta de disponibilidad con JOIN (es más rápido)
select id_reserva_ocupa,usr.id_usuario, fecha_ini, fecha_fin 
from usuario as usr join reserva_ocupa as rsv on usr.id_usuario = rsv.id_usuario;

-- Consulta de disponibilidad con producto cartesiano
select id_reserva_ocupa,usr.id_usuario, fecha_ini, fecha_fin 
from usuario as usr, reserva_ocupa as rsv
where usr.id_usuario = rsv.id_usuario;

-- Contar habitaciones ocupadas en un intervalo de fecha dado.
select count(*)
from usuario as usr join reserva_ocupa as rsv on usr.id_usuario = rsv.id_usuario
where (fecha_ini between '2013-08-15' and '2013-08-30' or 
 fecha_fin between '2013-08-15' and '2013-08-30')   and rsv.categoria_habitacion = 'B' 
and rsv.tipo_habitacion = 2 and ( estatus_reserva = 'activa' or estatus_reserva = 'ocupada' );

select *from reserva_ocupa
where '2013-02-13' between fecha_ini  and fecha_fin and '2013-02-14' between fecha_ini 
and fecha_fin;

select * from reserva_ocupa;
   
    delete from reserva_ocupa
    where id_reserva_ocupa > 0;

-- Habitaciones agrupadas por categoría y tipo
select categoria, tipo, count(*)
from habitacion
group by categoria,tipo;

select * from habitacion;
    
    delete from habitacion 
    where id_habitacion > 0;

select id_habitacion as id
from habitacion
where categoria = 'B' and tipo = 2
limit 1;

select * from usuario;

    delete from usuario
    where id_usuario <> '';

select * from consumible_almacen;

select * from rol;
select * from consumible;

select * from llamadas_tlfs
order by id_reserva_ocupa;

select * from table1;

insert into t1(dato) values ('aaa');
select last_insert_id() as id;

