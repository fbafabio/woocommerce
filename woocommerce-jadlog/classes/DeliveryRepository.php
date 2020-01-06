<?php

class DeliveryRepository {
    const TABLE_NAME     = 'woocommerce_jadlog';
    const INITIAL_STATUS = 'Pendente';

    public static function create($order, $values) {
        global $wpdb;
        $table_name = $wpdb->prefix.self::TABLE_NAME;

        $values = array_merge(
            array(
                'order_id' => $order->get_id(),
                'status'   => self::INITIAL_STATUS),
            $values);

        $wpdb->insert($table_name, $values);
    }

    public static function get_all() {
        global $wpdb;
        $table_name = $wpdb->prefix.self::TABLE_NAME;

        $result = $wpdb->get_results("SELECT * FROM {$table_name} ORDER BY id DESC");
        return $result;
    }

    public static function get_by_id($id) {
        global $wpdb;
        $table_name = $wpdb->prefix.self::TABLE_NAME;

        $result = $wpdb->get_results("SELECT * FROM {$table_name} WHERE id = {$id}");
        return $result[0];
    }

    public static function update($id, $values) {
        global $wpdb;
        $table_name = $wpdb->prefix.self::TABLE_NAME;

        $wpdb->update($table_name, $values, array('id' => $id));
    }
}
