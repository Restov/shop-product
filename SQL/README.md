# SQL доп. запросы
## 5a.
```sql
SELECT c.id, c.name, c.description, COUNT(cats.product_id) as cnt FROM categories as c 
LEFT JOIN (SELECT * FROM product_categories
UNION
SELECT * FROM product_main_categories )as cats
ON cats.category_id = c.id
GROUP BY c.name
ORDER BY cnt DESC;
```
## 5b.
```sql
SELECT c.id,c.name,c.description, COUNT(*) AS product_count
FROM (SELECT * FROM product_categories 
UNION
SELECT * FROM product_main_categories) as cats
INNER JOIN categories as c ON c.id = cats.category_id
INNER JOIN products  as p ON cats.product_id = p.id
WHERE p.quantity > 0
GROUP BY cats.category_id
HAVING product_count >=2 
ORDER BY product_count DESC;
```
