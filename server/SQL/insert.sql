INSERT INTO category (name,description) VALUES ("Рубашки Medicine","no desc");
INSERT INTO category (name,description) VALUES ("Все модели Medicine","no desc");
INSERT INTO category (name,description) VALUES ("Рубашки","no desc");

INSERT INTO product (title, price, price_no_discount, price_promo, description) VALUES ("Рубашка Medicine", 2499, 2699, 2227, "Рубашка выполнена...");

INSERT INTO product_categories (category_id,product_id) VALUES (1,1);
INSERT INTO product_categories (category_id,product_id) VALUES (2,1);
INSERT INTO product_categories (category_id,product_id) VALUES (2,1);
INSERT INTO product_main_category (category_id,product_id) VALUES (3,1);

INSERT INTO image(ref,alt) VALUES ("IFQ_QKY_Ri9tw5zwhKJc96mkqHfw/v4Dpg8e48.jpg", "Фото рубашки");
INSERT INTO product_images(product_id, image_id) VALUES (1,1);
INSERT INTO product_main_image(product_id,image_id) VALUES (1,1);


