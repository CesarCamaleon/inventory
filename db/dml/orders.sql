alter table order_dishes
add constraint PK_order_dishes primary key (dis_id, ord_id)


 -- falta arreglar la informacion
insert into orders values
(1,GETDATE(),32, 32*0.16, 32*1.16),
(2,GETDATE(),30, 30*0.16, 30*1.16),
(3,GETDATE(),28, 28*0.16, 28*1.16),
(4,GETDATE(),8, 8*0.16, 8*1.16),
(5,GETDATE(),4, 4*0.16, 4*1.16);
go

insert into order_dishes values
(1,1,1),
(2,1,1),
(2,2,3),
(2,3,1),
(3,3,2),
(3,4,2),
(3,5,1);
go

select ord_id, ord_date, ord_subtotal, ord_iva, ord_total from orders

select o.ord_id, d.dis_name, d.dis_price, od.ord_dis_quantity from orders o
join order_dishes od on o.ord_id = od.ord_id
join dishes d on od.dis_id = d.dis_id