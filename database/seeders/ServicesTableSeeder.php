<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('services')->delete();
        
        \DB::table('services')->insert(array (
            0 => 
            array (
                'id' => 1,
                'image' => 'assets/uploads/images/media_1648395345.jpg',
                'icon' => 'fas fa-wrench',
                'title' => 'Capital Markets',
                'slug' => 'capital-markets',
                'description' => '<p>Id debet interesset mea. Cu vel pertinax vulputate neglegentur, tamquam numquam reprehendunt no per. Et mei legimus perpetua constituam, ut sint partem indoctum his, modo wisi oporteat ex per. Eos graeci latine gloriatur et, duo tale conclusionemque an. Ut iisque evertitur persecuti eum, ad appetere qualisque ullamcorper per. Mandamus aliquando mediocritatem vis te. Est integre commune te, error equidem prodesset ut sed. Nec brute salutatus disputando at. Has unum veniam eripuit eu, te mea etiam legimus consectetuer. Usu nusquam temporibus an.</p>

<p>Ut tale sale oporteat vix, ut nam tollit erroribus, iriure maiorum id sed. Ne mea putant aperiri consetetur, repudiare cotidieque sea ei. At erat maiorum postulant qui, te prodesset consectetuer sit. Vim insolens voluptatum temporibus ei, eum ad munere deleniti. No omittam blandit instructior vis, est et clita virtute assentior. Agam vidisse corpora ut qui.</p>

<p>Cu eam quas impedit, quo et nonumy impedit. Ei vim quod erant. Sed id dicit exerci denique. Nec cu voluptaria rationibus consetetur. Usu cu delenit sensibus consetetur, animal pericula persecuti duo an. Sed ex prima menandri indoctum, mei unum eirmod reprehendunt at. Tale mentitum ut nec, has ad cetero dolores efficiantur, et lorem epicurei per.</p>',
                'created_at' => '2022-03-27 15:32:31',
                'updated_at' => '2022-04-11 11:25:26',
            ),
            1 => 
            array (
                'id' => 2,
                'image' => 'assets/uploads/images/media_1648395395.jpg',
                'icon' => 'fas fa-hands-helping',
                'title' => 'Business Advantage',
                'slug' => 'business-advantage',
                'description' => '<p>Quis omnesque ius cu. Simul bonorum eam ut, doming mollis vel et, eos cu amet mutat ponderum. Id error ubique appellantur pri, id discere perfecto nam, et offendit constituto qui. Ut dicta minimum pro, eu pri suas fierent posidonium. Eam ad insolens facilisis adolescens, error tritani omnesque at pro. Vim eu purto docendi apeirian.</p>

<p>Erant fabulas in vim, magna facilis eu vix. Ex sea suas signiferumque, eum eu odio molestiae, his ad cibo erroribus. Cum malorum commune maiestatis in, pro ea justo aliquam, et quodsi corpora percipitur duo. Cu quem vivendo dissentiunt sed, mea habeo affert detraxit ne, harum malorum abhorreant pri et. Sit ne sumo repudiare, ei sumo nonumy sit.</p>

<p>Ex adolescens adipiscing sit, cum et duis autem rationibus. His tritani sanctus periculis ad, dolore maiorum ex cum, consequat definitiones vis ex. Has at modo vivendo sententiae. Nostrud fabellas usu ut, mei nisl malorum comprehensam at. Ea mel etiam munere eligendi.</p>',
                'created_at' => '2022-03-27 15:33:11',
                'updated_at' => '2022-04-11 11:25:40',
            ),
            2 => 
            array (
                'id' => 3,
                'image' => 'assets/uploads/images/media_1648395376.jpg',
                'icon' => 'fas fa-chart-line',
                'title' => 'Audit Transaction',
                'slug' => 'audit-transaction',
                'description' => '<p>Est at dolore diceret. Ei eam rebum possit. Convenire assentior ea mea. Vel detraxit tincidunt eu, cu vidit electram vix, cibo dicta perpetua sed ad.</p>

<p>Eum novum facilis eu, regione recusabo duo ne. Ignota offendit corrumpit ut has, et est nihil utamur fuisset. Quis consequat honestatis cu vim, cum at wisi ipsum. Ea mea elit sensibus, erat veniam contentiones an mei. Inimicus volutpat an sea, meis vituperata qui id. Cu mei eloquentiam definitionem, commodo iracundia ad mea. Qui ad lorem iudicabit appellantur,</p>

<p>saepe altera his ei, ad iuvaret sadipscing nec. Mel accusam scribentur definitionem id. Vel detraxit tincidunt eu, cu vidit electram vix, cibo dicta perpetua sed ad. Eum novum facilis eu, regione recusabo duo ne. Ignota offendit corrumpit ut has, et est nihil utamur fuisset.</p>',
                'created_at' => '2022-03-27 15:34:30',
                'updated_at' => '2022-04-11 11:25:53',
            ),
        ));
        
        
    }
}