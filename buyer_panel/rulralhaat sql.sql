-- (
--     SELECT DISTINCT(interaction_id) as id,
--         interaction_timestamp as timestamp,
--         interaction_way as way,
--         interaction_by_user_id as by_user_id,
--         interaction_on_listing_id as on_listing_id,
--         ('') as sender_user_id,
--         ('') as sender_enquery_id,
--         (interaction_seen) as seen
--     FROM `user_interaction`
-- )
-- UNION all
-- (
--     SELECT DISTINCT(message_id) as id,
--         message_timestamp as timestamp,
--         ('message') as way,
--         ('') as by_user_id,
--         ('') as on_listing_id,
--         (message_sender_user_id) as sender_user_id,
--         (message_sender_enquery_id) as sender_enquery_id,
--         (message_seen) as seen
--     FROM `message`
-- )
-- UNION all
-- (
--     SELECT DISTINCT(report_id) as id,
--         report_timestamp as timestamp,
--         ('report') as way,
--         (report_by_user_id) as by_user_id,
--         (report_on_listing_id) as on_listing_id,
--         ('') as sender_user_id,
--         ('') as sender_enquery_id,
--         (report_seen) as seen
--     FROM `report`
-- )
-- ORDER BY `timestamp` DESC (
--         SELECT DISTINCT(interaction_id) as id,
--             interaction_timestamp as timestamp,
--             interaction_way as way,
--             interaction_type as type,
--             interaction_by_user_id as by_user_id,
--             interaction_on_listing_id as on_listing_id,
--             ('') as sender_user_id,
--             ('') as sender_enquery_id,
--             (interaction_seen) as seen
--         FROM `user_interaction`
--     )
-- UNION all
-- (
--     SELECT DISTINCT(message_id) as id,
--         message_timestamp as timestamp,
--         ('message') as way,
--         ('contact') as type,
--         ('') as by_user_id,
--         ('') as on_listing_id,
--         (message_sender_user_id) as sender_user_id,
--         (message_sender_enquery_id) as sender_enquery_id,
--         (message_seen) as seen
--     FROM `message`
-- )
-- UNION all
-- (
--     SELECT DISTINCT(report_id) as id,
--         report_timestamp as timestamp,
--         ('report') as way,
--         ('report') as type,
--         (report_by_user_id) as by_user_id,
--         (report_on_listing_id) as on_listing_id,
--         ('') as sender_user_id,
--         ('') as sender_enquery_id,
--         (report_seen) as seen
--     FROM `report`
-- )
-- ORDER by timestamp DESC (
--         SELECT (interaction_id) as id,
--             interaction_timestamp as timestamp,
--             interaction_way as way,
--             interaction_by_user_id as by_user_id,
--             interaction_on_listing_id as on_listing_id,
--             ('') as sender_user_id,
--             ('') as sender_enquery_id,
--             (interaction_seen) as seen
--         FROM `user_interaction`
--         ORDER BY `interaction_timestamp` DESC
--     )
-- UNION all
-- (
--     SELECT (message_id) as id,
--         message_timestamp as timestamp,
--         ('message') as way,
--         ('') as by_user_id,
--         ('') as on_listing_id,
--         (message_sender_user_id) as sender_user_id,
--         (message_sender_enquery_id) as sender_enquery_id,
--         (message_seen) as seen
--     FROM `message`
--     ORDER BY `message_timestamp` DESC
-- ) (
--     SELECT DISTINCT(interaction_id) as id,
--         interaction_timestamp as timestamp,
--         interaction_way as way,
--         interaction_type as type,
--         interaction_by_user_id as by_user_id,
--         interaction_on_listing_id as on_listing_id,
--         ('') as sender_user_id,
--         ('') as sender_enquery_id,
--         (interaction_seen) as seen
--     FROM `user_interaction`
--     where user_interaction.interaction_on_user_id = 166
-- )
-- UNION all
-- (
--     SELECT DISTINCT(message_id) as id,
--         message_timestamp as timestamp,
--         ('message') as way,
--         ('contact') as type,
--         ('') as by_user_id,
--         ('') as on_listing_id,
--         (message_sender_user_id) as sender_user_id,
--         (message_sender_enquery_id) as sender_enquery_id,
--         (message_seen) as seen
--     FROM `message`
--     where message.message_receiver_user_id = 166
-- )
-- UNION all
-- (
--     SELECT DISTINCT(report_id) as id,
--         report_timestamp as timestamp,
--         ('report') as way,
--         ('report') as type,
--         (report_by_user_id) as by_user_id,
--         (report_on_listing_id) as on_listing_id,
--         ('') as sender_user_id,
--         ('') as sender_enquery_id,
--         (report_seen) as seen
--     FROM `report`
--     where report.report_on_listing_id in (1, 2, 3, 4, 10, 11, 12)
-- )
-- ORDER by timestamp DESC 






(
        SELECT DISTINCT(interaction_id) as id,
            interaction_timestamp as timestamp,
            interaction_way as way,
            interaction_type as type,
            interaction_by_user_id as by_user_id,
            interaction_on_listing_id as on_listing_id,
            ('') as sender_user_id,
            ('') as sender_enquery_id,
            (interaction_seen) as seen
        FROM `user_interaction`
        where user_interaction.interaction_on_user_id = 166
    )
UNION all
(
    SELECT DISTINCT(message_id) as id,
        message_timestamp as timestamp,
        ('message') as way,
        ('contact') as type,
        ('') as by_user_id,
        ('') as on_listing_id,
        (message_sender_user_id) as sender_user_id,
        (message_sender_enquery_id) as sender_enquery_id,
        (message_seen) as seen
    FROM `message`
    where message.message_receiver_user_id = 166
)
UNION all
(
    SELECT DISTINCT(report_id) as id,
        report_timestamp as timestamp,
        ('report') as way,
        report_message as type,
        (report_by_user_id) as by_user_id,
        (report_on_listing_id) as on_listing_id,
        ('') as sender_user_id,
        ('') as sender_enquery_id,
        (report_seen) as seen
    FROM `report`
    where report.report_on_listing_id in (1, 2, 3, 4, 10, 11, 12, 13, 20, 21, 35)
)
UNION all
(
    SELECT DISTINCT(listing_id) as id,
        listing_permission_timestamp as timestamp,
        ('permission_status') as way,
        listing_permission as type,
        ('') as by_user_id,
        (listing_id) as on_listing_id,
        ('') as sender_user_id,
        ('') as sender_enquery_id,
        (listing_seen) as seen
    FROM `listing`
    where listing.listing_id in (1, 2, 3, 4, 10, 11, 12, 13, 20, 21, 35)
)
UNION all
(
   SELECT DISTINCT(listing_id) as id,
        listing_status_timestamp as timestamp,
        ('listing_status') as way,
        listing_status as type,
        ('') as by_user_id,
        (listing_id) as on_listing_id,
        ('') as sender_user_id,
        ('') as sender_enquery_id,
        (listing_seen) as seen
    FROM `listing`
    where listing.listing_id in (1, 2, 3, 4, 10, 11, 12, 13, 20, 21, 35)
) ORDER BY TIMESTAMP DESC