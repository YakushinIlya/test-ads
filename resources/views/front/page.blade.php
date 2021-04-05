<h1 class="h4">{{$page->head}}</h1>
{!! base64_decode($page->body) !!}

<noindex>
    <div class="mt-5">
        <strong>Поделитесь страницей</strong>
        <script src="https://yastatic.net/share2/share.js"></script>
        <div class="ya-share2" data-curtain data-size="l" data-services="vkontakte,facebook,odnoklassniki,messenger,telegram,twitter,viber,whatsapp,skype"></div>
    </div>
</noindex>