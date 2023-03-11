insert into snappfood.migrations (id, migration, batch)
values  (1, '2023_03_09_160840_create_orders_table', 1),
        (2, '2023_03_09_160923_create_vendors_table', 1),
        (3, '2023_03_09_161019_create_assignees_table', 1),
        (4, '2023_03_09_161029_create_delay_reports_table', 1),
        (5, '2023_03_09_161043_create_trips_table', 1),
        (6, '2014_10_12_000000_create_users_table', 2),
        (7, '2019_08_19_000000_create_failed_jobs_table', 2),
        (8, '2023_03_09_220349_create_agents_table', 3),
        (9, '2023_03_09_220832_rename_user_id_column_in_asignee_table', 3),
        (11, '2023_03_09_221143_add_user_id_column_to_orders_table', 4),
        (12, '2023_03_11_001601_create_jobs_table', 5);