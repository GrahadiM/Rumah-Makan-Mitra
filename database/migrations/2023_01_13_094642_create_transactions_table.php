<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_id')->constrained('users')->onDelete('restrict');
            $table->foreignId('address_id')->constrained('address')->onDelete('restrict')->nullable();
            // $table->integer('address_id')->nullable();
            $table->string('kode_transaksi')->nullable();
            $table->decimal('total_harga', 10, 2)->default(0);
            $table->string('type')->nullable(); // katering and instan
            $table->string('note')->nullable();
            $table->string('status', 100)->default('PENDING')->comment('PENDING, PROSES, SUCCESS', 'CANCEL');
            $table->enum('payment_status', ['1', '2', '3'])->comment('1=menunggu pembayaran, 2=sudah dibayar, 3=kadaluarsa')->default(1);
            $table->string('snap_token', 36)->nullable();
            $table->string('link_pembayaran')->nullable();
            $table->timestamp('tgl_pesanan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
