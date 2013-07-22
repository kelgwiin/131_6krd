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
where '2013-02-02' between fecha_ini and fecha_fin and 
 '2013-02-14' between fecha_ini and fecha_fin and rsv.categoria_habitacion = 'B' 
and rsv.tipo_habitacion = 2 and ( estatus_reserva = 'activa' or estatus_reserva = 'ocupada' );

select *from reserva_ocupa
where '2013-02-13' between fecha_ini  and fecha_fin and '2013-02-14' between fecha_ini 
and fecha_fin;

select * from reserva_ocupa;

select * from usuario;

-- Habitaciones agrupadas por categoría y tipo
select categoria, tipo, count(*)
from habitacion
group by categoria, tipo;

select * from habitacion;

select * from usuario;

select * from consumible;