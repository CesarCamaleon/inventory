
insert into warehouses values
('W01','Kitchen'),
('W02','Warehouse');
go
insert into stock values
(1,1,'W01',80),
(2,2,'W01',150),
(3,3,'W01',45),
(4,4,'W01',90),
(5,5,'W01',100),
(6,6,'W01',80),
(7,7,'W01',120),
(8,8,'W01',75),
(9,9,'W01',125),
(10,10,'W01',100),
(11,1,'W02',120),
(12,2,'W02',110),
(13,3,'W02',200),
(14,4,'W02',200),
(15,5,'W02',100),
(16,6,'W02',40),
(17,7,'W02',220),
(18,8,'W02',89),
(19,9,'W02',150),
(20,10,'W02',120);
go
--date--cantidad--almacen--idstock--concept
insert into movements values
(getdate(),5,'W01',10,2),
(getdate(),30,'W02',3,10),
(getdate(),20,'W01',10,2),
(getdate(),8,'W02',6,1),
(getdate(),43,'W01',10,10);


--ya son las 2 de la mañana.....weba

alter table warehouses
drop column war_id