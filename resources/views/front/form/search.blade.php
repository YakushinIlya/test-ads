<section class="search p-2 p-md-0">
    <div class="d-block d-md-none">
        <div class="btn btn-warning mt-3 btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <i class="fa fa-search"></i> Поиск
        </div>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <form action="{{route('search')}}" method="post">
                    @csrf
                    <div class="row search__form">
                        <div class="col-md-3 mb-1 mb-md-0">
                            <input name="query" class="form-control form-control-lg" type="text" placeholder="Что вы ищите?" data-toggle="tooltip" data-placement="top" title="Введите марку или модель автомобиля">
                        </div>
                        <div class="col-md-3 mb-1 mb-md-0">
                            <select name="region" id="regionSearch" class="form-control form-control-lg regionSearch" data-toggle="tooltip" data-placement="top" title="Выберите регион поиска автомобиля">
                                <option value="all">-- Регион --</option>
                                <option value="1696">Крым</option>
                                <option value="1697">Алтайский край</option>
                                <option value="1698">Амурская область</option>
                                <option value="1699">Архангельская область</option>
                                <option value="1700">Астраханская область</option>
                                <option value="1701">Белгородская область</option>
                                <option value="1702">Брянская область</option>
                                <option value="1703">Бурятия</option>
                                <option value="1704">Владимирская область</option>
                                <option value="1705">Волгоградская область</option>
                                <option value="1706">Вологодская область</option>
                                <option value="1707">Воронежская область</option>
                                <option value="1708">Еврейская АО</option>
                                <option value="1709">Ивановская область</option>
                                <option value="1710">Ингушетия</option>
                                <option value="1711">Иркутская область</option>
                                <option value="1712">Кабардино-Балкария</option>
                                <option value="1713">Калининградская область</option>
                                <option value="1714">Калмыкия</option>
                                <option value="1715">Калужская область</option>
                                <option value="1716">Камчатский край</option>
                                <option value="1717">Карачаево-Черкесия</option>
                                <option value="1718">Кемеровская область</option>
                                <option value="1719">Кировская область</option>
                                <option value="1720">Костромская область</option>
                                <option value="1721">Краснодарский край</option>
                                <option value="1722">Красноярский край</option>
                                <option value="1723">Курганская область</option>
                                <option value="1724">Курская область</option>
                                <option value="1725">Ленинградская область</option>
                                <option value="1726">Липецкая область</option>
                                <option value="1727">Магаданская область</option>
                                <option value="1728">Москва</option>
                                <option value="1729">Московская область</option>
                                <option value="1730">Мурманская область</option>
                                <option value="1731">Ненецкий АО</option>
                                <option value="1732">Нижегородская область</option>
                                <option value="1733">Новгородская область</option>
                                <option value="1734">Новосибирская область</option>
                                <option value="1735">Омская область</option>
                                <option value="1736">Оренбургская область</option>
                                <option value="1737">Орловская область</option>
                                <option value="1738">Пензенская область</option>
                                <option value="1739">Пермский край</option>
                                <option value="1740">Приморский край</option>
                                <option value="1741">Псковская область</option>
                                <option value="1742">Адыгея</option>
                                <option value="1743">Башкортостан</option>
                                <option value="1744">Дагестан</option>
                                <option value="1745">Карелия</option>
                                <option value="1746">Коми</option>
                                <option value="1747">Марий Эл</option>
                                <option value="1748">Мордовия</option>
                                <option value="1749">Саха (Якутия)</option>
                                <option value="1750">Северная Осетия</option>
                                <option value="1751">Татарстан</option>
                                <option value="1752">Тыва</option>
                                <option value="1753">Хакасия</option>
                                <option value="1754">Ростовская область</option>
                                <option value="1755">Рязанская область</option>
                                <option value="1756">Самарская область</option>
                                <option value="1757">Санкт-Петербург</option>
                                <option value="1758">Саратовская область</option>
                                <option value="1759">Сахалинская область</option>
                                <option value="1760">Свердловская область</option>
                                <option value="1761">Смоленская область</option>
                                <option value="1762">Ставропольский край</option>
                                <option value="1763">Тамбовская область</option>
                                <option value="1764">Тверская область</option>
                                <option value="1765">Томская область</option>
                                <option value="1766">Тульская область</option>
                                <option value="1767">Тюменская область</option>
                                <option value="1768">Удмуртия</option>
                                <option value="1769">Ульяновская область</option>
                                <option value="1770">Хабаровский край</option>
                                <option value="1771">Ханты-Мансийский АО</option>
                                <option value="1772">Челябинская область</option>
                                <option value="1773">Чеченская республика</option>
                                <option value="1774">Забайкальский край</option>
                                <option value="1775">Чувашия</option>
                                <option value="1776">Чукотский АО</option>
                                <option value="1777">Ямало-Ненецкий АО</option>
                                <option value="1778">Ярославская область</option>
                                <option value="1779">Республика Алтай</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-1 mb-md-0">
                            <select name="city" id="citySearch" class="form-control form-control-lg citySearch" data-toggle="tooltip" data-placement="top" title="Выберите город поиска автомобиля" disabled>
                                <option>-- Город --</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button href="#" class="btn btn-warning btn-lg btn-block"><i class="fa fa-search"></i> Найти</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a href="{{route('adsCreate')}}" class="btn btn-danger btn-lg btn-block d-block d-md-none mt-3"><i class="fa fa-plus"></i> Подать объявление</a>
    <div class="container">
        <div class="d-none d-md-block">
            <form action="{{route('search')}}" method="post">
                @csrf
                <div class="row search__form">
                    <div class="col-md-3 mb-1 mb-md-0">
                        <input name="query" class="form-control form-control-lg" type="text" placeholder="Что вы ищите?" data-toggle="tooltip" data-placement="top" title="Введите марку или модель автомобиля">
                    </div>
                    <div class="col-md-3 mb-1 mb-md-0">
                        <select name="region" id="regionSearch" class="form-control form-control-lg regionSearch" data-toggle="tooltip" data-placement="top" title="Выберите регион поиска автомобиля">
                            <option value="all">-- Регион --</option>
                            <option value="1696">Крым</option>
                            <option value="1697">Алтайский край</option>
                            <option value="1698">Амурская область</option>
                            <option value="1699">Архангельская область</option>
                            <option value="1700">Астраханская область</option>
                            <option value="1701">Белгородская область</option>
                            <option value="1702">Брянская область</option>
                            <option value="1703">Бурятия</option>
                            <option value="1704">Владимирская область</option>
                            <option value="1705">Волгоградская область</option>
                            <option value="1706">Вологодская область</option>
                            <option value="1707">Воронежская область</option>
                            <option value="1708">Еврейская АО</option>
                            <option value="1709">Ивановская область</option>
                            <option value="1710">Ингушетия</option>
                            <option value="1711">Иркутская область</option>
                            <option value="1712">Кабардино-Балкария</option>
                            <option value="1713">Калининградская область</option>
                            <option value="1714">Калмыкия</option>
                            <option value="1715">Калужская область</option>
                            <option value="1716">Камчатский край</option>
                            <option value="1717">Карачаево-Черкесия</option>
                            <option value="1718">Кемеровская область</option>
                            <option value="1719">Кировская область</option>
                            <option value="1720">Костромская область</option>
                            <option value="1721">Краснодарский край</option>
                            <option value="1722">Красноярский край</option>
                            <option value="1723">Курганская область</option>
                            <option value="1724">Курская область</option>
                            <option value="1725">Ленинградская область</option>
                            <option value="1726">Липецкая область</option>
                            <option value="1727">Магаданская область</option>
                            <option value="1728">Москва</option>
                            <option value="1729">Московская область</option>
                            <option value="1730">Мурманская область</option>
                            <option value="1731">Ненецкий АО</option>
                            <option value="1732">Нижегородская область</option>
                            <option value="1733">Новгородская область</option>
                            <option value="1734">Новосибирская область</option>
                            <option value="1735">Омская область</option>
                            <option value="1736">Оренбургская область</option>
                            <option value="1737">Орловская область</option>
                            <option value="1738">Пензенская область</option>
                            <option value="1739">Пермский край</option>
                            <option value="1740">Приморский край</option>
                            <option value="1741">Псковская область</option>
                            <option value="1742">Адыгея</option>
                            <option value="1743">Башкортостан</option>
                            <option value="1744">Дагестан</option>
                            <option value="1745">Карелия</option>
                            <option value="1746">Коми</option>
                            <option value="1747">Марий Эл</option>
                            <option value="1748">Мордовия</option>
                            <option value="1749">Саха (Якутия)</option>
                            <option value="1750">Северная Осетия</option>
                            <option value="1751">Татарстан</option>
                            <option value="1752">Тыва</option>
                            <option value="1753">Хакасия</option>
                            <option value="1754">Ростовская область</option>
                            <option value="1755">Рязанская область</option>
                            <option value="1756">Самарская область</option>
                            <option value="1757">Санкт-Петербург</option>
                            <option value="1758">Саратовская область</option>
                            <option value="1759">Сахалинская область</option>
                            <option value="1760">Свердловская область</option>
                            <option value="1761">Смоленская область</option>
                            <option value="1762">Ставропольский край</option>
                            <option value="1763">Тамбовская область</option>
                            <option value="1764">Тверская область</option>
                            <option value="1765">Томская область</option>
                            <option value="1766">Тульская область</option>
                            <option value="1767">Тюменская область</option>
                            <option value="1768">Удмуртия</option>
                            <option value="1769">Ульяновская область</option>
                            <option value="1770">Хабаровский край</option>
                            <option value="1771">Ханты-Мансийский АО</option>
                            <option value="1772">Челябинская область</option>
                            <option value="1773">Чеченская республика</option>
                            <option value="1774">Забайкальский край</option>
                            <option value="1775">Чувашия</option>
                            <option value="1776">Чукотский АО</option>
                            <option value="1777">Ямало-Ненецкий АО</option>
                            <option value="1778">Ярославская область</option>
                            <option value="1779">Республика Алтай</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-1 mb-md-0">
                        <select name="city" id="citySearch" class="form-control form-control-lg citySearch" data-toggle="tooltip" data-placement="top" title="Выберите город поиска автомобиля" disabled>
                            <option>-- Город --</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button href="#" class="btn btn-warning btn-lg btn-block"><i class="fa fa-search"></i> Найти</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>