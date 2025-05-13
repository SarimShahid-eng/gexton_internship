use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->unsigned(); // Primary key with unsigned big integer
            $table->string('ip_address', 45); // IPv6 support
            $table->string('username', 100)->nullable();
            $table->string('password');
            $table->string('salt')->nullable();
            $table->string('email', 254);
            $table->string('activation_code', 40)->nullable();
            $table->string('forgotten_password_code', 40)->nullable();
            $table->unsignedInteger('forgotten_password_time')->nullable();
            $table->string('remember_code', 40)->nullable();
            $table->unsignedInteger('created_on'); // Timestamp in UNIX format
            $table->unsignedInteger('last_login')->nullable(); // UNIX timestamp
            $table->unsignedTinyInteger('active')->nullable();
            $table->string('first_name', 50)->nullable();
            $table->string('last_name', 50)->nullable();
            $table->string('company', 100)->default('Gexton');
            $table->string('phone', 20)->nullable();
            $table->enum('user_type', ['admin', 'student', 'teacher'])->nullable();
            $table->bigInteger('session_year_id')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('course_id')->nullable();
            $table->text('reason_suspend')->nullable();
            $table->datetime('suspend_date')->nullable();
            $table->integer('is_completed')->default(0);
            $table->enum('entry_test', ['true', 'false', '', ''])->default('false');
            $table->enum('result', ['pass', 'fail', 'nothing', ''])->default('nothing');
            $table->integer('test_countdown')->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
