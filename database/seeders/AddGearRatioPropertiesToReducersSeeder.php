<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Reducer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AddGearRatioPropertiesToReducersSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = Storage::putFileAs(
            'reducers',
            'https://phenomenal-cocada-29cd77.netlify.app/resources/images/product-page-slider-main-img.png',
            'ZDY-80.png'
        );

        $reducer = new Reducer();
        $reducer->title = 'ZDY-80';
        $reducer->serie_id = 1;
        $reducer->subtitle = 'редуктор цилиндрический одноступенчатый';
        $reducer->transmission_type = 'Цилиндрический';
        $reducer->number_of_transmission_stages = 'Одноступенчатый';
        $reducer->axle_arrangement = 'Параллельное';
        $reducer->overall = '<div class="construct-peculiarities">
    <h3 class="product-page__overall-title construct-peculiarities__title">Конструктивные особенности</h3>
    <p class="product-page__overall-text construct-peculiarities__text">Редуктор типа ZDY-80, является горизонтальным одноступенчатым редуктором, в разъёмном чугунном корпусе.</p>
  </div>
<div class="application-area">
  <h3 class="product-page__overall-title application-area__title">Область применения</h3>
  <p class="product-page__overall-text application-area__text">Общепромышленные редукторы. Применяются в кинематических схемах, с небольшим передаточным числом (менее 6).</p>
</div>';
        $reducer->info = '<div>
  <h4>Пример обозначения редуктора при заказе</h4>
  <ul role="list">
    <li>ZDY – 80 – 2,5 – 12 ЦЦ У2</li>
    <li>ZDY - тип редуктора</li>
    <li>80 - межосевое расстояние</li>
    <li>2,5 - передаточное число</li>
    <li>12 - вариант сборки</li>
    <li>ЦЦ – вариант исполнения конца входного и выходного вала соответственно</li>
    <li>У2 – климатическое исполнение и категория размещения</li>
  </ul>
  </div>
  <div>
    <h4>Редуктор типа ZDY-80, горизонтальный одноступенчатым редуктор</h4>
    <p>При своей компактности, с межосевым расстоянием 80 мм., передаёт крутящий момент до 470 Нм. Шестерни редуктора выполнены из высоколегированной кованной стали, подвергнуты цементации с последующей шлифовкой зуба (степень точности 6 ISO 1328:1995). Направление вращения - реверсивное. Скорость вращения быстроходного вала до 3000 об/мин., при необходимости более высоких скоростей вращения, при согласовании с изготовителем, возможно изготовления отбалансированных зубчатых колёс с установкой подшипников более высокого класса точности. Допускается работа в режиме мультипликации (с увеличением скорости вращения). Применяется в общемашиностроительных узлах и машинах, где требуется малое передаточное число, кинематических схемах где необходимо изменить направление вращения или развести в горизонтали валы (на 80 мм.)</p>
  </div>
  <div>
    <h4>Устанавливается по запросу:</h4>
    <ul>
      <li>Ограничитель обратного хода</li>
      <li>Маслонагреватель</li>
      <li>Маслоохладитель</li>
      <li>Фильтр масла</li>
      <li>Конденсатоотводчик</li>
      <li>Магнитная пробка</li>
      <li>Датчик температуры в картере редуктора</li>
      <li>Датчик температуры в подшипниках</li>
      <li>Датчик контроля уровня масла</li>
      <li>Контроль частоты вращения</li>
      <li>Датчик расхода масла (при принудительной системе смазки)</li>
      <li>Датчик уровня масла</li>
    </ul>
  </div>';
        $reducer->weight = 14;
        $reducer->total_center_distance = 80;
        $reducer->rated_output_torque = 470;
        $reducer->efficiency = 0.97;
        $reducer->preview_image_url = $filePath;
        $reducer->save();

        $reducer->gear_ratios()->sync([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]);

        $filePath = Storage::putFileAs(
            'reducers',
            'https://phenomenal-cocada-29cd77.netlify.app/resources/images/product-page-slider-main-img.png',
            'ZDY-100.png'
        );
        $reducer = new Reducer();
        $reducer->title = 'ZDY-100';
        $reducer->serie_id = 1;
        $reducer->subtitle = 'редуктор цилиндрический одноступенчатый';
        $reducer->transmission_type = 'Цилиндрический';
        $reducer->number_of_transmission_stages = 'Одноступенчатый';
        $reducer->axle_arrangement = 'Параллельное';
        $reducer->overall = '<div class="construct-peculiarities">
    <h3 class="product-page__overall-title construct-peculiarities__title">Конструктивные особенности</h3>
    <p class="product-page__overall-text construct-peculiarities__text">Редуктор типа ZDY-100, является горизонтальным одноступенчатым редуктором, в разъёмном чугунном корпусе.</p>
  </div>
<div class="application-area">
  <h3 class="product-page__overall-title application-area__title">Область применения</h3>
  <p class="product-page__overall-text application-area__text">Общепромышленные редукторы. Применяются в кинематических схемах, с небольшим передаточным числом (менее 6).</p>
</div>';
        $reducer->info = '<div>
  <h4>Пример обозначения редуктора при заказе</h4>
  <ul role="list">
    <li>ZDY – 100 – 2,5 – 12 ЦЦ У2</li>
    <li>ZDY - тип редуктора</li>
    <li>100 - межосевое расстояние</li>
    <li>2,5 - передаточное число</li>
    <li>12 - вариант сборки</li>
    <li>ЦЦ – вариант исполнения конца входного и выходного вала соответственно</li>
    <li>У2 – климатическое исполнение и категория размещения</li>
  </ul>
  </div>
  <div>
    <h4>Редуктор типа ZDY-100, горизонтальный одноступенчатым редуктор</h4>
    <p>При своей компактности, с межосевым расстоянием 80 мм., передаёт крутящий момент до 470 Нм. Шестерни редуктора выполнены из высоколегированной кованной стали, подвергнуты цементации с последующей шлифовкой зуба (степень точности 6 ISO 1328:1995). Направление вращения - реверсивное. Скорость вращения быстроходного вала до 3000 об/мин., при необходимости более высоких скоростей вращения, при согласовании с изготовителем, возможно изготовления отбалансированных зубчатых колёс с установкой подшипников более высокого класса точности. Допускается работа в режиме мультипликации (с увеличением скорости вращения). Применяется в общемашиностроительных узлах и машинах, где требуется малое передаточное число, кинематических схемах где необходимо изменить направление вращения или развести в горизонтали валы (на 80 мм.)</p>
  </div>
  <div>
    <h4>Устанавливается по запросу:</h4>
    <ul>
      <li>Ограничитель обратного хода</li>
      <li>Маслонагреватель</li>
      <li>Маслоохладитель</li>
      <li>Фильтр масла</li>
      <li>Конденсатоотводчик</li>
      <li>Магнитная пробка</li>
      <li>Датчик температуры в картере редуктора</li>
      <li>Датчик температуры в подшипниках</li>
      <li>Датчик контроля уровня масла</li>
      <li>Контроль частоты вращения</li>
      <li>Датчик расхода масла (при принудительной системе смазки)</li>
      <li>Датчик уровня масла</li>
    </ul>
  </div>';
        $reducer->weight = 35;
        $reducer->total_center_distance = 100;
        $reducer->rated_output_torque = 810;
        $reducer->efficiency = 0.97;
        $reducer->preview_image_url = $filePath;
        $reducer->save();

        $reducer->gear_ratios()->sync([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]);
    }
}
