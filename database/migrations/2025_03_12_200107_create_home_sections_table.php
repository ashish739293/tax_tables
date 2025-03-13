use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHomeSectionsTable extends Migration
{
    public function up()
    {
        Schema::table('home_sections', function (Blueprint $table) {
            $table->string('image_1')->after('footer_text');
            $table->string('image_2')->after('image_1');
            $table->string('image_3')->after('image_2');
        });
    }

    public function down()
    {
        Schema::table('home_sections', function (Blueprint $table) {
            $table->dropColumn(['image_1', 'image_2', 'image_3']);
        });
    }
}
