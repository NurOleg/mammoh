@php
use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.app')

@section('content')
    <script src="//unpkg.com/@popperjs/core@2" defer></script>
    <script src="//unpkg.com/tippy.js@6" defer></script>
    <script type="module">
        tippy('[data-tippy-theme="grey"]');
        if(window.innerWidth >= 1200) {
            tippy(document.querySelectorAll('[data-tippy-theme="red"]'), {
                showOnCreate: true,
            });
        }
    </script>

    <div class="configurator-zdy-page-grid">
        <aside class="configurator-zdy-page-aside">
            <div class="configurator-zdy-page-aside__fixed-desktop-elems">

                {{ Breadcrumbs::render() }}

                <a href="#" class="previous-link configurator-zdy-page-aside__previous-link">
                    <svg class="previous-link__icon" width="24" height="12">
                        <use href="../resources/svgSprites/svgSprite.svg#icon-back"></use>
                    </svg>
                </a>
                <div class="configurator-zdy-page-aside__top-row">
                    <picture class="configurator-zdy-page-aside__main-img-picture">
                        <img src="{{ Storage::url($reducer->preview_image_url) }}" loading="lazy" decoding="async"
                             alt="image" class="configurator-zdy-page-aside__main-img" width="315" height="100">
                    </picture>
                    <div class="configurator-zdy-page-aside__info">
                        <p>Качественная группа мотор-редукторов с широким диапазоном параметров, положении и
                            комплектаций.
                        </p>
                        <p>Скорость на выходе: 7-387 об/мин
                        </p>
                        <p>Момент на выходе: до 1740 Нм
                        </p>
                        <p>Мощность мотора: 0.06-11 кВт
                        </p>
                        <p>Правильный подбор российских двигателей.
                        </p>
                    </div>
                </div>
            </div>
        </aside>
        <section class="configurator-zdy-page" x-data="{configuratorSubmitModal: false}">
            <div class="container configurator-zdy-page__container">
                <div class="configurator-zdy-page__title-row">
                    <a href="#" class="previous-link configurator-zdy-page__previous-link">
                        <svg class="previous-link__icon" width="24" height="12">
                            <use href="../resources/svgSprites/svgSprite.svg#icon-back"></use>
                        </svg>
                    </a>
                    <h1 class="section-title configurator-zdy-page__section-title">{{ $reducer->title }}</h1>
                </div>
                <div class="configurator-zdy-page__top-row">
                    <picture class="configurator-zdy-page__main-img-picture">
                        <img src="{{ Storage::url($reducer->preview_image_url) }}" loading="lazy" decoding="async"
                             alt="image" class="configurator-zdy-page__main-img" width="315" height="100">
                    </picture>
                    <div class="configurator-zdy-page__info">
                        <p>Качественная группа мотор-редукторов с широким диапазоном параметров, положении и
                            комплектаций.
                        </p>
                        <p>Скорость на выходе: 7-387 об/мин
                        </p>
                        <p>Момент на выходе: до 1740 Нм
                        </p>
                        <p>Мощность мотора: 0.06-11 кВт
                        </p>
                        <p>Правильный подбор российских двигателей.
                        </p>
                    </div>
                </div>
                <form action="#" class="configurator-page-form" x-data="{step: 1}"
                      x-on:submit.prevent="configuratorSubmitModal = true">
                    <fieldset
                        class="configurator-page-form__fieldset configurator-page-form__fieldset--step-1 configurator-page-form__fieldset--b-b-none active"
                        x-data="{selectValue: '', selectValue2: '', selectValue3: '', inputNumberValueMin1: null, inputNumberValueMax1: null, inputNumberValueMin2: null, inputNumberValueMax2: null }"
                        x-bind:class="{ 'active': step === 1 }">
                        <h2 class="configurator-page-form__title active" x-bind:class="{ 'active': step === 1 }">
                            <p>Шаг <span>1</span> <span>:</span></p>
                            <p>Технические параметры</p>
                        </h2>
                        <div
                            class="configurator-page-form__step-body configurator-page-form__step-body-1 configurator-page-form__step-body-1--zdy-page"
                            x-show="step === 1" x-collapse.duration.800ms>
                            <div
                                class="configurator-page-form__controls-group configurator-page-form__controls-group--step-body-1">
                                <p class="configurator-page-form__controls-group-label"><i>i</i><span>-</span><span>передаточное отношение</span>
                                </p>
                                <div class="configurator-page-form__select-wrapper"
                                     data-tippy-content="укажите передаточное отношение" data-tippy-arrow="true"
                                     data-tippy-placement="top" data-tippy-theme="red">
                                    <select name="variant" id="variant" class="configurator-page-form__select"
                                            x-model="selectValue">
                                        <option value="?">Не знаю</option>
                                        @foreach($reducer->gear_ratios as $gear_ratio)
                                            <option value="{{ $gear_ratio->value }}">{{ $gear_ratio->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div
                                class="configurator-page-form__controls-group configurator-page-form__controls-group--step-body-1">
                                <p class="configurator-page-form__controls-group-label"><span>Вариант сборки</span></p>
                                <ul role="list"
                                    class="configurator-page-form__radio-list configurator-page-form__radio-list--zdy-page">
                                    <li>
                                        <input type="radio" name="inputPower" id="все" value="все" checked
                                               x-ref="inputPowerInput">
                                        <button type="button" aria-label="button"
                                                class="configurator-page-form__radio-list-btn">Не знаю
                                        </button>
                                    </li>
                                    @foreach($reducer->build_options as $build_option)
                                        <li>
                                            <input type="radio" name="inputPower" id="{{ $build_option->value }}" value="{{ $build_option->value }}">
                                            <button type="button" aria-label="button"
                                                class="configurator-page-form__radio-list-btn">{{ $build_option->value }}
                                            </button>
                                        </li>
                                    @endforeach
{{--                                    <li data-tippy-content="недоступный вариант" data-tippy-arrow="true"--}}
{{--                                        data-tippy-placement="right" data-tippy-theme="grey">--}}
{{--                                        <input type="radio" name="inputPower" id="53" value="53" class="disabled">--}}
{{--                                        <button type="button" aria-label="button"--}}
{{--                                                class="configurator-page-form__radio-list-btn disabled">53--}}
{{--                                        </button>--}}
{{--                                    </li>--}}
                                </ul>
                            </div>
                            <div
                                class="configurator-page-form__controls-group configurator-page-form__controls-group--step-body-1">
                                <p class="configurator-page-form__controls-group-label"><span>Вал входной</span></p>
                                <div class="configurator-page-form__select-wrapper"
                                     data-tippy-content="укажите входной вал" data-tippy-arrow="true"
                                     data-tippy-placement="top" data-tippy-theme="red">
                                    <select name="variant" id="variant" class="configurator-page-form__select"
                                            x-model="selectValue2">
                                        <option value="{{ $reducer->default_input_shaft->value }}">{{ $reducer->default_input_shaft->value }}</option>
                                        @foreach($reducer->shafts as $shaft)
                                            <option value="{{ $shaft->value }}">{{ $shaft->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div
                                class="configurator-page-form__controls-group configurator-page-form__controls-group--step-body-1">
                                <p class="configurator-page-form__controls-group-label"><span>Вал выходной</span></p>
                                <div class="configurator-page-form__select-wrapper"
                                     data-tippy-content="укажите выходной вал" data-tippy-arrow="true"
                                     data-tippy-placement="top" data-tippy-theme="red">
                                    <select name="variant" id="variant" class="configurator-page-form__select"
                                            x-model="selectValue3">
                                        <option value="{{ $reducer->default_output_shaft->value }}">{{ $reducer->default_output_shaft->value }}</option>
                                        @foreach($reducer->shafts as $shaft)
                                            <option value="{{ $shaft->value }}">{{ $shaft->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="button" aria-label="button"
                                    class="configurator-page-form__clear-btn configurator-page-form__clear-btn--zdy-page"
                                    x-on:click="selectValue = 'Вариант'; selectValue2 = 'Вариант'; selectValue3 = 'Вариант'; inputNumberValueMin1 = null; inputNumberValueMax1 = null; inputNumberValueMin2 = null; inputNumberValueMax2 = null; $refs.inputPowerInput.checked = true; $refs.inputSpeedInput.checked = true">
                                <svg class="configurator-page-form__clear-btn-icon" width="12" height="12">
                                    <use href="../resources/svgSprites/svgSprite.svg#close-icon"></use>
                                </svg>
                                <p>Очистить</p>
                            </button>
                            <div class="configurator-page-form__to-next-step-checkbox" x-on:click="step = 2">
                                <input type="checkbox" name="toNextStepCheckbox" id="toNextStepCheckbox">
                                <label for="toNextStepCheckbox">Отметьте, если не знаете, что выбрать.</label>
                            </div>
                            <button type="button" aria-label="button"
                                    class="btn btn--primary configurator-page-form__to-step-2-btn"
                                    x-on:click="step = 2">Следующий шаг
                            </button>
                        </div>
                    </fieldset>
                    <fieldset class="configurator-page-form__fieldset configurator-page-form__fieldset--step-2"
                              x-bind:class="{ 'active': step === 2 }">
                        <h2 class="configurator-page-form__title" x-bind:class="{ 'active': step === 2 }">
                            <p>Шаг <span>2</span> <span>:</span></p>
                            <p>Оформление заявки</p>
                        </h2>
                        <div
                            class="configurator-page-form__step-body configurator-page-form__step-body-2 configurator-page-form__step-body-2--zdy-page"
                            x-show="step === 2" x-collapse.duration.800ms>
                            <h3 class="section-title configurator-page-form__full-name-title"><span>NMRV</span><span>_110</span><span>_7,5</span><span>_132IMB5</span><span>_1SH1R</span><span>_АИР112M2</span><span>_M1</span><span>_B3</span><span>_0</span><span>_AB</span></span>
                            </h3>
                            <div
                                class="form-controls-wrapper configurator-page-form__form-controls-wrapper configurator-page-form__form-controls-wrapper--reductor-count">
                                <label>Кол-во редукторов<sup>*</sup></label>
                                <div class="configurator-page-form__counter" x-data="{counter: 1}">
                                    <button type="button" aria-label="button"
                                            class="configurator-page-form__counter-minus" x-on:click="counter--"
                                            x-bind:class="{ 'disabled': counter === 1 }">
                                        <svg class="configurator-page-form__counter-minus-icon" width="16" height="11">
                                            <use href="../resources/svgSprites/svgSprite.svg#icon-minus"></use>
                                        </svg>
                                    </button>
                                    <input type="number" name="reductorsCount" id="reductorsCount" disabled
                                           x-model="counter">
                                    <button type="button" aria-label="button"
                                            class="configurator-page-form__counter-plus" x-on:click="counter++">
                                        <svg class="configurator-page-form__counter-plus-icon" width="16" height="15">
                                            <use href="../resources/svgSprites/svgSprite.svg#icon-plus"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div
                                class="form-controls-wrapper configurator-page-form__form-controls-wrapper configurator-page-form__form-controls-wrapper--textarea">
                                <label for="comment">Комментарий к заявке</label>
                                <textarea name="comment" id="comment">Введите текст</textarea>
                            </div>
                            <div class="form-controls-wrapper configurator-page-form__form-controls-wrapper">
                                <div class="form-controls-wrapper__validation-wrapper">
                                    <label for="name">ФИО<sup>*</sup></label>
                                    <input type="text" name="name" id="name" placeholder="Ваше имя" required>
                                    <svg class="form-controls-wrapper__error-icon" width="18" height="18">
                                        <use href="../resources/svgSprites/svgSprite.svg#error-icon"></use>
                                    </svg>
                                    <svg class="form-controls-wrapper__correct-icon" width="18" height="18">
                                        <use href="../resources/svgSprites/svgSprite.svg#correct-icon"></use>
                                    </svg>
                                </div>
                            </div>
                            <div class="form-controls-wrapper configurator-page-form__form-controls-wrapper">
                                <label for="mail">E-mail<sup>*</sup></label>
                                <div class="form-controls-wrapper__validation-wrapper">
                                    <input type="email" name="mail" id="mail" placeholder="ivan@mail.ru" required>
                                    <svg class="form-controls-wrapper__error-icon" width="18" height="18">
                                        <use href="../resources/svgSprites/svgSprite.svg#error-icon"></use>
                                    </svg>
                                    <svg class="form-controls-wrapper__correct-icon" width="18" height="18">
                                        <use href="../resources/svgSprites/svgSprite.svg#correct-icon"></use>
                                    </svg>
                                </div>
                            </div>
                            <div class="form-controls-wrapper configurator-page-form__form-controls-wrapper">
                                <label for="phone">Телефон</label>
                                <div class="configurator-page-form__phonecode-grid">
                                    <div class="configurator-page-form__phonecode-wrapper">
                                        <select name="phonecode" id="phonecode">
                                            <option value="+86">+86</option>
                                            <option value="+7">+7</option>
                                            <option value="+90">+90</option>
                                        </select>
                                    </div>
                                    <input type="tel" name="phone" id="phone" placeholder="999-99-99-99"
                                           x-mask="999-99-99-99">
                                </div>
                            </div>
{{--                            <div class="form-controls-wrapper configurator-page-form__form-controls-wrapper">--}}
{{--                                <label for="captcha">Код с картинки<sup>*</sup></label>--}}
{{--                                <div class="configurator-page-form__captcha-grid">--}}
{{--                                    <div class="configurator-page-form__captcha-img">--}}
{{--                                        <img loading="lazy" decoding="async" src="/resources/images/captcha-img.png"--}}
{{--                                             alt="image" width="31" height="24">--}}
{{--                                    </div>--}}
{{--                                    <input type="text" name="captcha" id="captcha" placeholder="Введите код" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="configurator-page-form__copyright">
                                <input type="checkbox" name="copyright" id="copyright">
                                <label for="copyright"><a href="#">Подтверждаю согласие с политикой
                                        конфиденциальности</a></label>
                            </div>
                            <button class="btn btn--outline configurator-page-form__to-prev-step-btn" type="button"
                                    x-on:click="step = 1">Назад
                            </button>
                            <button type="submit" class="btn btn--primary configurator-page-form__submit-btn">Отправить
                                заявку
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal configurator-submit-modal" x-on:click.self="configuratorSubmitModal = false"
                 x-bind:class="{ 'active': configuratorSubmitModal === true }"
                 x-data="{step: 1, toggleCharsList: false}">
                <div class="modal-content configurator-submit-modal__content">
                    <div class="modal__title-wrapper configurator-submit-modal__title-wrapper">
                        <h3 class="modal__title configurator-submit-modal__title"
                            x-text="step === 1 || step === 2 ? 'Подтвердите почту' : 'Заявка отправлена'">Подтвердите
                            почту</h3>
                        <button type="button" aria-label="button"
                                class="btn modal__close-btn order-complete-modal__close-btn"
                                x-on:click="configuratorSubmitModal = false">
                            <svg class="order-complete-modal__close-btn-icon" width="15" height="15">
                                <use href="../resources/svgSprites/svgSprite.svg#close-icon"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="configurator-submit-modal__steps">
                        <div class="configurator-submit-modal__step-1" x-show="step === 1" x-collapse.duration.800ms>
                            <div class="configurator-submit-modal__step-1-info">
                                <span>Вы указали:</span>
                                <strong>Ivan@gmail.com</strong>
                            </div>
                            <p>На вашу почту будет отправлено письмо с кодом.</p>
                        </div>
                        <div class="configurator-submit-modal__step-2" x-show="step === 2" x-collapse.duration.800ms>
                            <div class="configurator-submit-modal__step-2-info">
                                <p>Мы отправили четырёхзначный код на ivan@gmail.com+ длинный Email.</p>
                                <p>Введите код ниже, чтобы подтвердить почту.</p>
                            </div>
                            <div class="configurator-submit-modal__four-digit-code"
                                 x-data="{inputValue1: '', inputValue2: '', inputValue3: '', inputValue4: ''}">
                                <div class="configurator-submit-modal__four-digit-code-number"
                                     x-bind:class="{ 'active': inputValue1 }">
                                    <input type="number" name="number1" id="number1" x-model="inputValue1">
                                </div>
                                <div class="configurator-submit-modal__four-digit-code-number"
                                     x-bind:class="{ 'active': inputValue2 }">
                                    <input type="number" name="number2" id="number2" x-model="inputValue2">
                                </div>
                                <div class="configurator-submit-modal__four-digit-code-number"
                                     x-bind:class="{ 'active': inputValue3 }">
                                    <input type="number" name="number3" id="number3" x-model="inputValue3">
                                </div>
                                <div class="configurator-submit-modal__four-digit-code-number"
                                     x-bind:class="{ 'active': inputValue4 }">
                                    <input type="number" name="number4" id="number4" x-model="inputValue4">
                                </div>
                            </div>
                        </div>
                        <div class="configurator-submit-modal__step-3" x-show="step === 3" x-collapse.duration.800ms>
                            <div class="configurator-submit-modal__step-3-info">
                                <p>Менеджер свяжется с вами в ближайшее время.</p>
                            </div>
                            <div class="configurator-submit-modal__details">
                                <strong>Детали заказа:</strong>
                                <div class="configurator-submit-modal__details-row">
                                    <h3 class="configurator-submit-modal__details-title">
                                        <span>NMRV</span><span>_110</span><span>_7</span><span>,5</span><span>_132IMB5</span><span>_1SH1R</span><span>_АИР112M2</span><span>_M1</span><span>_B3</span><span>_0</span><span>_AB</span>
                                    </h3>
                                    <p class="configurator-submit-modal__details-count">1 <span>шт</span></p>
                                </div>
                                <a href="#" download class="configurator-submit-modal__download-link">
                                    <svg class="configurator-submit-modal__download-link-icon" width="17" height="18">
                                        <use href="../resources/svgSprites/svgSprite.svg#download-icon"></use>
                                    </svg>
                                    Скачать чертёж
                                </a>
                                <ul role="list" class="configurator-submit-modal__chars-list"
                                    x-show="toggleCharsList === true" x-collapse.duration.800ms>
                                    <li>
                                        <p>Тип передачи</p>
                                        <p>Цилиндрический</p>
                                    </li>
                                    <li>
                                        <p>Количество ступеней передачи</p>
                                        <p>Одноступенчатый</p>
                                    </li>
                                    <li>
                                        <p>Расположение осей</p>
                                        <p>Параллельное</p>
                                    </li>
                                    <li>
                                        <p>Передаточное отношение</p>
                                        <p>от 1.25 до 5.6;</p>
                                    </li>
                                    <li>
                                        <p>Номинальный крутящий момент, Н*м</p>
                                        <p>470</p>
                                    </li>
                                    <li>
                                        <p>Суммарное межосевое расстояние, мм</p>
                                        <p>80</p>
                                    </li>
                                    <li>
                                        <p>Масса, кг</p>
                                        <p>14</p>
                                    </li>
                                    <li>
                                        <p>КПД. отн.ед.</p>
                                        <p>0.97</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="configurator-submit-modal__bottom configurator-submit-modal__bottom--step-1"
                         x-bind:class="{ 'active': step === 1 }">
                        <div class="configurator-submit-modal__step-line-wrapper">
                            <span class="configurator-submit-modal__step-line-circle active"></span>
                            <p class="configurator-submit-modal__step-line"></p>
                            <span class="configurator-submit-modal__step-line-circle"></span>
                        </div>
                        <div class="configurator-submit-modal__btn-group">
                            <button type="button" aria-label="button"
                                    class="btn btn--flat configurator-submit-modal__prev-step-btn"
                                    x-on:click="step = 1">Назад
                            </button>
                            <button type="button" aria-label="button"
                                    class="btn btn--primary configurator-submit-modal__next-step-btn"
                                    x-on:click="step = 2">Далее
                            </button>
                        </div>
                    </div>
                    <div class="configurator-submit-modal__bottom configurator-submit-modal__bottom--step-2"
                         x-bind:class="{ 'active': step === 2 }">
                        <div class="configurator-submit-modal__step-line-wrapper">
                            <span class="configurator-submit-modal__step-line-circle"></span>
                            <p class="configurator-submit-modal__step-line"></p>
                            <span class="configurator-submit-modal__step-line-circle active"></span>
                        </div>
                        <div class="configurator-submit-modal__btn-group">
                            <button type="button" aria-label="button"
                                    class="btn btn--flat configurator-submit-modal__prev-step-btn"
                                    x-on:click="step = 2">Назад
                            </button>
                            <button type="button" aria-label="button"
                                    class="btn btn--primary configurator-submit-modal__next-step-btn"
                                    x-on:click="step = 3">Далее
                            </button>
                        </div>
                    </div>
                    <div class="configurator-submit-modal__bottom configurator-submit-modal__bottom--step-3"
                         x-bind:class="{ 'active': step === 3 }">
                        <button type="button" aria-label="button" class="configurator-submit-modal__expand-btn"
                                x-on:click="toggleCharsList = !toggleCharsList">
                            Подробнее
                            <svg class="configurator-submit-modal__expand-btn-icon" width="12" height="10"
                                 x-bind:class="{ 'active': toggleCharsList === true }">
                                <use href="../resources/svgSprites/svgSprite.svg#icon-expand"></use>
                            </svg>
                        </button>
                        <div class="configurator-submit-modal__btn-group">
                            <a href="#" class="btn btn--primary configurator-submit-modal__btn-link">На страницу
                                товара</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
