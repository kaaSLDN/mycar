<?php

use yii\db\Migration;

/**
 * Handles the creation of table `fueling`.
 */
class m180116_123111_create_fueling_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('fueling', [
            'id' => $this->primaryKey(11),
            'iron_horse_id' => $this->integer(11),
            'user_id' => $this->integer(11),
            'date' => $this->date(),
            'gas_station' => $this->string(100),
            'fuel_type' => $this->string(20),
            'price_per_liter' => $this->float(11),
            'liters' => $this->float(11),
            'mileage' => $this->integer(11)
        ], $tableOptions);

        $this->createIndex(
            'idx-fueling-iron_horse_id',
            'fueling',
            'iron_horse_id'
        );

        $this->createIndex(
            'idx-fueling-user_id',
            'fueling',
            'user_id'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('fueling');
    }
}
