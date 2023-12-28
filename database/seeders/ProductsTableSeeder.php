<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Luke Caldwell',
                'image' => 'assets/uploads/images/media_1648448302.jpg',
                'slug' => 'shirt-2',
                'price' => 30.0,
                'discount_price' => 20.0,
                'short_description' => '<p>Est unum audire maiorum an, hinc conceptam liberavisse mel cu. Cu vis inciderint instructior, no qui modo clita petentium. Ne sed animal ponderum perpetua, stet quodsi vocent has te, cum decore animal inermis ut. Ea oporteat mediocrem vim, usu quot iriure eu. Aliquid ponderum indoctum eum ne, eam ne everti delicata euripidis, ut eam saperet pericula.<br />
&nbsp;</p>',
                'description' => '<p>Est unum audire maiorum an, hinc conceptam liberavisse mel cu. Cu vis inciderint instructior, no qui modo clita petentium. Ne sed animal ponderum perpetua, stet quodsi vocent has te, cum decore animal inermis ut. Ea oporteat mediocrem vim, usu quot iriure eu. Aliquid ponderum indoctum eum ne, eam ne everti delicata euripidis, ut eam saperet pericula.</p>

<p>Ei indoctum accommodare duo, per salutatus democritum ex. Pro ne summo audire ullamcorper. Pri tibique honestatis te, per ut magna regione, ferri erant latine eam ei. Ad nibh appellantur vim, nec animal gubergren no. Mea sumo debet id, vis id soleat lobortis splendide.</p>',
                'sku' => 'Alan Rivas',
                'brand' => 'Aphrodite Fernandez',
                'color' => 'Zachary Simon',
                'size' => NULL,
                'weight' => 'Dorian Alexander',
                'dimensions' => 'Leslie Sullivan',
                'stock' => 715,
                'category_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2022-03-28 06:18:44',
                'updated_at' => '2022-04-08 15:18:58',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'McKenzie Kemp',
                'image' => 'assets/uploads/images/media_1648448315.jpg',
                'slug' => 'est-ducimus-aliquam',
                'price' => 50.0,
                'discount_price' => 25.0,
                'short_description' => '<p>Eos ad possim nominati, idque falli te has. Ex putent torquatos has, mei cu reformidans accommodare, hinc equidem assentior sit at. An velit ubique graece eum. Adhuc ullum vix ei, ei dolore verterem vis. Aeque commodo sententiae id duo. Usu luptatum reformidans ex, usu no option volutpat, nostrud consulatu mei ei.</p>',
                'description' => '<p>Eos ad possim nominati, idque falli te has. Ex putent torquatos has, mei cu reformidans accommodare, hinc equidem assentior sit at. An velit ubique graece eum. Adhuc ullum vix ei, ei dolore verterem vis. Aeque commodo sententiae id duo. Usu luptatum reformidans ex, usu no option volutpat, nostrud consulatu mei ei.</p>

<p>Ei pro tale fugit reprimique. Porro iudico adversarium eos eu, cu nostrum postulant eum, his molestie temporibus id. Putant vidisse ut has, feugait platonem ea duo. Sea consul comprehensam ut. No duo congue iisque iudicabit. Et sea brute alterum accusata.</p>',
                'sku' => 'Olga Vaughn',
                'brand' => 'Ramona Steele',
                'color' => 'Stewart York',
                'size' => NULL,
                'weight' => 'Norman Vaughan',
                'dimensions' => 'Lana Price',
                'stock' => 932,
                'category_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2022-03-28 06:19:05',
                'updated_at' => '2022-04-08 15:18:31',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Deanna Terry',
                'image' => 'assets/uploads/images/media_1648448302.jpg',
                'slug' => 'fugit-id-voluptate',
                'price' => 60.0,
                'discount_price' => 30.0,
                'short_description' => '<p>At erat maiorum postulant qui, te prodesset consectetuer sit. Vim insolens voluptatum temporibus ei, eum ad munere deleniti. No omittam blandit instructior vis, est et clita virtute assentior. Agam vidisse corpora ut qui. Cu eam quas impedit, quo et nonumy impedit.</p>',
                'description' => '<p>At erat maiorum postulant qui, te prodesset consectetuer sit. Vim insolens voluptatum temporibus ei, eum ad munere deleniti. No omittam blandit instructior vis, est et clita virtute assentior. Agam vidisse corpora ut qui. Cu eam quas impedit, quo et nonumy impedit.</p>

<p>Ei vim quod erant. Sed id dicit exerci denique. Nec cu voluptaria rationibus consetetur. Usu cu delenit sensibus consetetur, animal pericula persecuti duo an. Sed ex prima menandri indoctum, mei unum eirmod reprehendunt at. Tale mentitum ut nec, has ad cetero dolores efficiantur, et lorem epicurei per.</p>',
                'sku' => 'Sloane Weaver',
                'brand' => 'Naida Dawson',
                'color' => 'Noble Serrano',
                'size' => NULL,
                'weight' => 'Marsden Estes',
                'dimensions' => 'Quail Clemons',
                'stock' => 467,
                'category_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2022-03-28 06:19:57',
                'updated_at' => '2022-04-08 15:21:35',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Hermione Lee',
                'image' => 'assets/uploads/images/media_1648448315.jpg',
                'slug' => 'quos-reiciendis-poss',
                'price' => 70.0,
                'discount_price' => 40.0,
                'short_description' => '<p>Id debet interesset mea. Cu vel pertinax vulputate neglegentur, tamquam numquam reprehendunt no per. Et mei legimus perpetua constituam, ut sint partem indoctum his, modo wisi oporteat ex per. Eos graeci latine gloriatur et, duo tale conclusionemque an. Ut iisque evertitur persecuti eum, ad appetere qualisque ullamcorper per. Mandamus aliquando mediocritatem vis te.</p>',
                'description' => '<p>Id debet interesset mea. Cu vel pertinax vulputate neglegentur, tamquam numquam reprehendunt no per. Et mei legimus perpetua constituam, ut sint partem indoctum his, modo wisi oporteat ex per. Eos graeci latine gloriatur et, duo tale conclusionemque an. Ut iisque evertitur persecuti eum, ad appetere qualisque ullamcorper per. Mandamus aliquando mediocritatem vis te.</p>

<p>Est integre commune te, error equidem prodesset ut sed. Nec brute salutatus disputando at. Has unum veniam eripuit eu, te mea etiam legimus consectetuer. Usu nusquam temporibus an. Ut tale sale oporteat vix, ut nam tollit erroribus, iriure maiorum id sed. Ne mea putant aperiri consetetur, repudiare cotidieque sea ei.</p>',
                'sku' => 'Penelope Figueroa',
                'brand' => 'Hayes Workman',
                'color' => 'Byron Eaton',
                'size' => NULL,
                'weight' => 'Nicole Wolf',
                'dimensions' => 'Keiko Hooper',
                'stock' => 142,
                'category_id' => 3,
                'deleted_at' => NULL,
                'created_at' => '2022-03-28 06:21:30',
                'updated_at' => '2022-04-08 15:20:50',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Hope Bennett',
                'image' => 'assets/uploads/images/media_1648448302.jpg',
                'slug' => 'quo-sunt-id-rem-per',
                'price' => 20.0,
                'discount_price' => 15.0,
                'short_description' => '<p>Laudem qualisque maiestatis his in, at mea abhorreant temporibus, ad nam vidisse copiosae lobortis. Ius at postea officiis, duis delicatissimi at qui. Discere reformidans duo eu. Qui ullum deleniti at, ex quo liber platonem, per et alia nibh hendrerit.</p>',
                'description' => '<p>Laudem qualisque maiestatis his in, at mea abhorreant temporibus, ad nam vidisse copiosae lobortis. Ius at postea officiis, duis delicatissimi at qui. Discere reformidans duo eu. Qui ullum deleniti at, ex quo liber platonem, per et alia nibh hendrerit.</p>

<p>Sapientem consetetur temporibus sea eu. Duo summo vituperata cu. Mei ferri munere verterem eu. Prima eruditi invenire ut cum, eos vero sonet id. His te virtute adipiscing. Nibh labitur interesset no vis, usu in libris atomorum explicari, pro at delectus lucilius. Tota mollis maluisset ea mei.</p>',
                'sku' => 'Daquan Pace',
                'brand' => 'Shannon Mckinney',
                'color' => 'Karyn Vincent',
                'size' => NULL,
                'weight' => 'Ria Hooper',
                'dimensions' => 'Demetrius Summers',
                'stock' => 971,
                'category_id' => 3,
                'deleted_at' => NULL,
                'created_at' => '2022-03-28 06:22:01',
                'updated_at' => '2022-04-08 15:20:20',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Abigail Duran',
                'image' => 'assets/uploads/images/media_1648448315.jpg',
                'slug' => 'aut-obcaecati-at-rep',
                'price' => 50.0,
                'discount_price' => 20.0,
                'short_description' => '<p>Ex adolescens adipiscing sit, cum et duis autem rationibus. His tritani sanctus periculis ad, dolore maiorum ex cum, consequat definitiones vis ex. Has at modo vivendo sententiae. Nostrud fabellas usu ut, mei nisl malorum comprehensam at. Ea mel etiam munere eligendi.</p>',
                'description' => '<p>Ex adolescens adipiscing sit, cum et duis autem rationibus. His tritani sanctus periculis ad, dolore maiorum ex cum, consequat definitiones vis ex. Has at modo vivendo sententiae. Nostrud fabellas usu ut, mei nisl malorum comprehensam at. Ea mel etiam munere eligendi.</p>

<p>Est at dolore diceret. Ei eam rebum possit. Convenire assentior ea mea. Vel detraxit tincidunt eu, cu vidit electram vix, cibo dicta perpetua sed ad. Eum novum facilis eu, regione recusabo duo ne. Ignota offendit corrumpit ut has, et est nihil utamur fuisset.</p>',
                'sku' => 'Cullen Snow',
                'brand' => 'Timon Hess',
                'color' => 'Candice Wilkinson',
                'size' => NULL,
                'weight' => 'Yoshi Brennan',
                'dimensions' => 'Blair Saunders',
                'stock' => 999,
                'category_id' => 2,
                'deleted_at' => NULL,
                'created_at' => '2022-03-28 06:23:07',
                'updated_at' => '2022-04-08 15:22:28',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Lewis Leblanc',
                'image' => 'assets/uploads/images/media_1648448302.jpg',
                'slug' => 'itaque-qui-nisi-cons',
                'price' => 70.0,
                'discount_price' => 50.0,
                'short_description' => '<p>Ex nec elitr persecuti vituperatoribus, dolorem corrumpit sed cu. Vel wisi tacimates consulatu in. Purto dolore vis et, causae malorum voluptatum pri ad. Te duis perfecto has, pri atqui laoreet ne, ne sea choro erroribus. In affert eleifend persecuti his. Vix ne cibo affert definitionem, no eum delicata adversarium.</p>',
                'description' => '<p>Ex nec elitr persecuti vituperatoribus, dolorem corrumpit sed cu. Vel wisi tacimates consulatu in. Purto dolore vis et, causae malorum voluptatum pri ad. Te duis perfecto has, pri atqui laoreet ne, ne sea choro erroribus. In affert eleifend persecuti his. Vix ne cibo affert definitionem, no eum delicata adversarium.</p>

<p>In suas mundi ignota est, vim eu posse deleniti expetenda, ut est veri mundi conceptam. Ei duo numquam tincidunt delicatissimi, ut solum ipsum nec, et tollit invenire mei. Lorem platonem consectetuer usu at, vero audiam perpetua ne vix. Te iracundia maiestatis vis, te eirmod noluisse constituam eam. Cu libris populo deterruisset cum. Ne sea inani constituto vituperatoribus.</p>',
                'sku' => 'Helen Garcia',
                'brand' => 'Walker Carr',
                'color' => 'Rinah Boyle',
                'size' => NULL,
                'weight' => 'Hashim Randall',
                'dimensions' => 'Lavinia Chandler',
                'stock' => 319,
                'category_id' => 4,
                'deleted_at' => NULL,
                'created_at' => '2022-03-28 06:23:45',
                'updated_at' => '2022-04-08 15:20:00',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Amber Beard',
                'image' => 'assets/uploads/images/media_1648448315.jpg',
                'slug' => 'cillum-sunt-autem-e',
                'price' => 90.0,
                'discount_price' => 40.0,
                'short_description' => '<p>Quis omnesque ius cu. Simul bonorum eam ut, doming mollis vel et, eos cu amet mutat ponderum. Id error ubique appellantur pri, id discere perfecto nam, et offendit constituto qui. Ut dicta minimum pro, eu pri suas fierent posidonium. Eam ad insolens facilisis adolescens, error tritani omnesque at pro.</p>',
                'description' => '<p>Quis omnesque ius cu. Simul bonorum eam ut, doming mollis vel et, eos cu amet mutat ponderum. Id error ubique appellantur pri, id discere perfecto nam, et offendit constituto qui. Ut dicta minimum pro, eu pri suas fierent posidonium. Eam ad insolens facilisis adolescens, error tritani omnesque at pro.</p>

<p>Vim eu purto docendi apeirian. Erant fabulas in vim, magna facilis eu vix. Ex sea suas signiferumque, eum eu odio molestiae, his ad cibo erroribus. Cum malorum commune maiestatis in, pro ea justo aliquam, et quodsi corpora percipitur duo. Cu quem vivendo dissentiunt sed, mea habeo affert detraxit ne, harum malorum abhorreant pri et. Sit ne sumo repudiare, ei sumo nonumy sit.</p>',
                'sku' => 'Lesley Sears',
                'brand' => 'Serina Wolfe',
                'color' => 'Nerea Trevino',
                'size' => NULL,
                'weight' => 'Maggy Camacho',
                'dimensions' => 'Bree Smith',
                'stock' => 612,
                'category_id' => 3,
                'deleted_at' => NULL,
                'created_at' => '2022-03-28 06:24:36',
                'updated_at' => '2022-04-08 15:22:06',
            ),
        ));
        
        
    }
}