@extends('layout')

@section('content')


<div class="play-container">
    <script defer src="{{ asset('js/actions_chemins.js') }}"></script>
    <div class="map-container">


        <div id="map-container">
            <img src="{{ asset('assets/img/map240324.png') }}" alt="Carte des Aventuriers du Rail" id="map-image">
            <!-- Boutons sur la carte -->
            <button class="map-button" style="top: 150px; left: 85px;" id="button-Foulestaque"></button>
            <button class="map-button" style="top: 185px; left: 218px;" id="button-Apex"></button>
            <button class="map-button" style="top: 50px; left: 240px;" id="button-Java"></button>
            <button class="map-button" style="top: 275px; left: 62px;" id="button-Ruby"></button>
            <button class="map-button" style="top: 500px; left: 500PX;" id="button-Toniz"></button>
            <button class="map-button" style="top: 419px; left: 517PX;" id="button-Falcon"></button>
            <button class="map-button" style="top: 357px; left: 655PX;" id="button-Ariana"></button>
            <button class="map-button" style="top: 230px; left: 767PX;" id="button-Templake"></button>
            <button class="map-button" style="top: 437px; left: 318PX;" id="button-Swift"></button>
            <button class="map-button" style="top: 510PX; left: 30PX;" id="button-Kotlin"></button>
            <button class="map-button" style="top: 611PX; left: 177PX;" id="button-Rust"></button>
            <button class="map-button" style="top: 622PX; left: 370PX;" id="button-Scala"></button>
            <button class="map-button" style="top: 590PX; left: 510PX;" id="button-Perl"></button>
            <button class="map-button" style="top: 625PX; left: 587PX;" id="button-Lua"></button>
            <button class="map-button" style="top: 158px; left: 608PX;" id="button-Haskell"></button>
            <button class="map-button" style="top: 330PX; left: 822PX;" id="button-Elixir"></button>
            <button class="map-button" style="top: 350PX; left: 908PX;" id="button-Dart"></button>
            <button class="map-button" style="top: 270PX; left: 912PX;" id="button-Groovy"></button>
            <button class="map-button" style="top: 135PX; left: 865PX;" id="button-Fortran"></button>
            <button class="map-button" style="top: 76PX; left: 745PX;" id="button-Laraville"></button>
            <button class="map-button" style="top: 41PX; left: 413PX;" id="button-Assembly"></button>
            <button class="map-button" style="top: 207PX; left: 382PX;" id="button-Pascal"></button>
            <button class="map-button" style="top: 69PX; left: 1100PX;" id="button-Ada"></button>
            <button class="map-button" style="top: 150PX; left: 1140PX;" id="button-Cobol"></button>
            <button class="map-button" style="top: 227PX; left: 1153PX;" id="button-Julia"></button>
            <button class="map-button" style="top: 545PX; left: 1105PX;" id="button-Erlang"></button>
            <button class="map-button" style="top: 275PX; left: 552PX;" id="button-Prolog"></button>
            <button class="map-button" style="top: 578PX; left: 715PX;" id="button-Lisp"></button>
            <button class="map-button" style="top: 580PX; left: 932PX;" id="button-Elm"></button>
            <button class="map-button" style="top: 133PX; left: 460PX;" id="button-Delphi"></button>
            <button class="map-button" style="top: 345PX; left: 125PX;" id="button-Python"></button>
            <button class="map-button" style="top: 551PX; left: 175PX;" id="button-Crystal"></button>

            <div class="line" id="trajet-Foulestaque-Apex" style="position: absolute; left: 89px; top: 155px; width: 137px; height: 8px; transform: rotate(15deg); background-color: #523814;"></div>
            <div class="line" id="trajet-Kotlin-Rust" style="position: absolute; left: 35px; top: 510px; width: 180px; height: 8px; transform: rotate(36deg); background-color: #523814; animation-delay: 0.5s;"></div>
            <div class="line" id="trajet-Rust-Scala" style="position: absolute; left: 177px; top: 611px; width: 193px; height: 8px; transform: rotate(3.22deg); background-color: #523814; animation-delay: 1.5s;"></div>
            <div class="line" id="trajet-Kotlin-Python" style="position: absolute; left: 35px; top: 510px; width: 190px; height: 8px; transform: rotate(-57deg); background-color: #523814; animation-delay: 1s;"></div>
            <div class="line" id="trajet-Kotlin-Crystal" style="position: absolute; left: 35px; top: 510px; width: 170px; height: 8px; transform: rotate(18deg); background-color: #523814; animation-delay: 0.5s;"></div>
            <div class="line" id="trajet-Crystal-Scala" style="position: absolute; left: 175px; top: 557px; width: 210px; height: 8px; transform: rotate(18deg); background-color: #523814; animation-delay: 1s;"></div>
            <div class="line" id="trajet-Python-Swift" style="position: absolute; left: 140px; top: 351px; width: 210px; height: 8px; transform: rotate(25deg); background-color: #523814;"></div>
            <div class="line" id="trajet-Swift-Toniz" style="position: absolute; left: 320px; top: 439px; width: 210px; height: 8px; transform: rotate(20deg); background-color: #523814; animation-delay: 1.5s;"></div>
            <div class="line" id="trajet-Swift-Falcon" style="position: absolute; left: 320px; top: 439px; width: 210px; height: 8px; transform: rotate(-4deg); background-color: #523814; animation-delay: 1s;"></div>
            <div class="line" id="trajet-Falcon-Ariana" style="position: absolute; left: 519px; top: 421px; width: 160px; height: 8px; transform: rotate(-22deg); background-color: #523814; animation-delay: 0.5s;"></div>
            <div class="line" id="trajet-Ariana-Elixir" style="position: absolute; left: 670px; top: 364px; width: 170px; height: 8px; transform: rotate(-10deg); background-color: #523814; animation-delay: 1s;"></div>
            <div class="line" id="trajet-Scala-Perl" style="position: absolute; left: 370PX; top: 622PX; width: 160px; height: 8px; transform: rotate(-10deg); background-color: #523814; animation-delay: 1.5s;"></div>
            <div class="line" id="trajet-Toniz-Perl" style="position: absolute; left: 515PX; top: 500PX; width: 105px; height: 8px; transform: rotate(85deg); background-color: #523814;"></div>
            <div class="line" id="trajet-Perl-Lua" style="position: absolute; left: 515PX; top: 590PX; width: 95px; height: 8px; transform: rotate(25deg); background-color: #523814; animation-delay: 1.5s;"></div>
            <div class="line" id="trajet-Falcon-Prolog" style="position: absolute; left: 521px; top: 421px; width: 150px; height: 8px; transform: rotate(-75deg); background-color: #523814; animation-delay: 0.5s;"></div>
            <div class="line" id="trajet-Falcon-Toniz" style="position: absolute; left: 529px; top: 421px; width: 100px; height: 8px; transform: rotate(99deg); background-color: #523814; animation-delay: 1s;"></div>
            <div class="line" id="trajet-Python-Apex" style="position: absolute; left: 140px; top: 351px; width: 180px; height: 8px; transform: rotate(-61deg); background-color: #523814; animation-delay: 1.5s;"></div>
            <div class="line" id="trajet-Python-Ruby" style="position: absolute; left: 131px; top: 351px; width: 90px; height: 8px; transform: rotate(-136deg); background-color: #523814; animation-delay: 0.5s;"></div>
            <div class="line" id="trajet-Foulestaque-Ruby" style="position: absolute; left: 97px; top: 155px; width: 137px; height: 8px; transform: rotate(100deg); background-color: #523814;"></div>
            <div class="line" id="trajet-Foulestaque-Java" style="position: absolute; left: 97px; top: 155px; width: 177px; height: 8px; transform: rotate(-34deg); background-color: #523814; animation-delay: 0.5s;"></div>
            <div class="line" id="trajet-Kotlin-Ruby" style="position: absolute; left: 35px; top: 510px; width: 220px; height: 8px; transform: rotate(-82deg); background-color: #523814;"></div>
            <div class="line" id="trajet-Java-Pascal" style="position: absolute; left: 245px; top: 50px; width: 220px; height: 8px; transform: rotate(48deg); background-color: #523814; animation-delay: 1.5s;"></div>
            <div class="line" id="trajet-Apex-Pascal" style="position: absolute; left: 225px; top: 191px; width: 177px; height: 8px; transform: rotate(8deg); background-color: #523814; animation-delay: 0.5s;"></div>
            <div class="line" id="trajet-Pascal-Prolog" style="position: absolute; left: 395px; top: 213px; width: 187px; height: 8px; transform: rotate(22deg); background-color: #523814; animation-delay: 1s;"></div>
            <div class="line" id="trajet-Pascal-Delphi" style="position: absolute; left: 395px; top: 213px; width: 107px; height: 8px; transform: rotate(-46deg); background-color: #523814;"></div>
            <div class="line" id="trajet-Assembly-Pascal" style="position: absolute; left: 388px; top: 213px; width: 157px; height: 8px; transform: rotate(-79deg); background-color: #523814;"></div>
            <div class="line" id="trajet-Assembly-Delphi" style="position: absolute; left: 430px; top: 53px; width: 107px; height: 8px; transform: rotate(65deg); background-color: #523814; animation-delay: 0.5s;"></div>
            <div class="line" id="trajet-Delphi-Haskell" style="position: absolute; left: 475px; top: 143px; width: 147px; height: 8px; transform: rotate(10deg); background-color: #523814; animation-delay: 1.5s;"></div>
            <div class="line" id="trajet-Prolog-Ariana" style="position: absolute; left: 565px; top: 283px; width: 137px; height: 8px; transform: rotate(38deg); background-color: #523814; animation-delay: 1s;"></div>
            <div class="line" id="trajet-Haskell-Prolog" style="position: absolute; left: 560px; top: 283px; width: 137px; height: 8px; transform: rotate(-65deg); background-color: #523814;"></div>
            <div class="line" id="trajet-Prolog-Laraville" style="position: absolute; left: 560px; top: 283px; width: 277px; height: 8px; transform: rotate(-46deg); background-color: #523814;"></div>
            <div class="line" id="trajet-Haskell-Laraville" style="position: absolute; left: 620px; top: 163px; width: 157px; height: 8px; transform: rotate(-32deg); background-color: #523814; animation-delay: 0.5s;"></div>
            <div class="line" id="trajet-Lua-Lisp" style="position: absolute; left: 595px; top: 631px; width: 143px; height: 8px; transform: rotate(-18deg); background-color: #523814;"></div>
            <div class="line" id="trajet-Lisp-Dart" style="position: absolute; left: 720px; top: 590px; width: 298px; height: 8px; transform: rotate(-50deg); background-color: #523814; animation-delay: 1.5s;"></div>
            <div class="line" id="trajet-Lisp-Elm" style="position: absolute; left: 720px; top: 588px; width: 230px; height: 8px; transform: rotate(0deg); background-color: #523814; animation-delay: 1s;"></div>
            <div class="line" id="trajet-Dart-Elixir" style="position: absolute; left: 910px; top: 362px; width: 88px; height: 8px; transform: rotate(-166deg); background-color: #523814; animation-delay: 0.5s;"></div>
            <div class="line" id="trajet-Dart-Groovy" style="position: absolute; left: 913px; top: 362px; width: 88px; height: 8px; transform: rotate(-86deg); background-color: #523814;"></div>
            <div class="line" id="trajet-Dart-Elm" style="position: absolute; left: 923px; top: 362px; width: 228px; height: 8px; transform: rotate(84deg); background-color: #523814; animation-delay: 1s;"></div>
            <div class="line" id="trajet-Groovy-Templake" style="position: absolute; left: 912px; top: 282px; width: 134px; height: 8px; transform: rotate(-166deg); background-color: #523814; animation-delay: 1.5s;"></div>
            <div class="line" id="trajet-Groovy-Julia" style="position: absolute; left: 914px; top: 280px; width: 254px; height: 8px; transform: rotate(-11deg); background-color: #523814;"></div>
            <div class="line" id="trajet-Templake-Elixir" style="position: absolute; left: 778px; top: 240px; width: 120px; height: 8px; transform: rotate(59deg); background-color: #523814; animation-delay: 0.5s;"></div>
            <div class="line" id="trajet-Templake-Fortran" style="position: absolute; left: 777px; top: 239px; width: 130px; height: 8px; transform: rotate(-45deg); background-color: #523814;"></div>
            <div class="line" id="trajet-Templake-Laraville" style="position: absolute; left: 773px; top: 239px; width: 149px; height: 8px; transform: rotate(-99deg); background-color: #523814; animation-delay: 0.5s;"></div>
            <div class="line" id="trajet-Laraville-Fortran" style="position: absolute; left: 877px; top: 145px; width: 130px; height: 8px; transform: rotate(-155deg); background-color: #523814; animation-delay: 1.5s;"></div>
            <div class="line" id="trajet-Fortran-Groovy" style="position: absolute; left: 879px; top: 145px; width: 140px; height: 8px; transform: rotate(70deg); background-color: #523814; animation-delay: 1s;"></div>
            <div class="line" id="trajet-Fortran-Ada" style="position: absolute; left: 879px; top: 140px; width: 230px; height: 8px; transform: rotate(-16deg); background-color: #523814; animation-delay: 1.5s;"></div>
            <div class="line" id="trajet-Ada-Groovy" style="position: absolute; left: 1120px; top: 80px; width: 280px; height: 8px; transform: rotate(133.5deg); background-color: #523814; animation-delay: 0.5s;"></div>
            <div class="line" id="trajet-Ada-Cobol" style="position: absolute; left: 1120px; top: 80px; width: 80px; height: 8px; transform: rotate(67deg); background-color: #523814;"></div>
            <div class="line" id="trajet-Cobol-Julia" style="position: absolute; left: 1150px; top: 150px; width: 80px; height: 8px; transform: rotate(79deg); background-color: #523814; animation-delay: 1.5s;"></div>
            <div class="line" id="trajet-Julia-Erlang" style="position: absolute; left: 1168px; top: 230px; width: 333px; height: 8px; transform: rotate(98.5deg); background-color: #523814; animation-delay: 0.5s;"></div>
            <div class="line" id="trajet-Erlang-Elm" style="position: absolute; left: 920px; top: 588px; width: 202px; height: 8px; transform: rotate(-10deg); background-color: #523814;"></div>

            <!-- Bouton au milieu des segments -->
            <button class="line-button" id="milieu-Foulestaque-Apex" style="top: calc((150px + 185px) / 2); left: calc((85px + 218px) / 2); background-color: var(--color-chemin-rose);"></button>
            <div class="line-text" id="chiffre-Foulestaque-Apex" style="top: calc((150px + 185px) / 2); left: calc((85px + 218px) / 2);">2</div>

            <button class="line-button" id="milieu-Kotlin-Rust" style="top: calc((510px + 611px) / 2); left: calc((30px + 177px) / 2); background-color: var(--color-chemin-gris);"></button>
            <div class="line-text" id="chiffre-Kotlin-Rust" style="top: calc((510px + 611px) / 2); left: calc((30px + 177px) / 2);">4</div>

            <button class="line-button" id="milieu-Rust-Scala" style="top: calc((611px + 622px) / 2); left: calc((177px + 370px) / 2); background-color: var(--color-chemin-noir);"></button>
            <div class="line-text" id="chiffre-Rust-Scala" style="top: calc((611px + 622px) / 2); left: calc((177px + 370px) / 2);">3</div>

            <button class="line-button" id="milieu-Kotlin-Python" style="top: calc((510px + 345px) / 2); left: calc((30px + 125px) / 2); background-color: var(--color-chemin-rouge);"></button>
            <div class="line-text" id="chiffre-Kotlin-Python" style="top: calc((510px + 345px) / 2); left: calc((30px + 125px) / 2);">4</div>

            <button class="line-button" id="milieu-Kotlin-Crystal" style="top: calc((510px + 551px) / 2); left: calc((30px + 175px) / 2); background-color: var(--color-chemin-vert);"></button>
            <div class="line-text" id="chiffre-Kotlin-Crystal" style="top: calc((510px + 551px) / 2); left: calc((30px + 175px) / 2);">2</div>

            <button class="line-button" id="milieu-Crystal-Scala" style="top: calc((551px + 622px) / 2); left: calc((175px + 370px) / 2); background-color: var(--color-chemin-bleu);"></button>
            <div class="line-text" id="chiffre-Crystal-Scala" style="top: calc((551px + 622px) / 2); left: calc((175px + 370px) / 2);">2</div>

            <button class="line-button" id="milieu-Python-Swift" style="top: calc((345px + 437px) / 2); left: calc((125px + 318px) / 2);  background-color: var(--color-chemin-jaune);"></button>
            <div class="line-text" id="chiffre-Python-Swift" style="top: calc((345px + 437px) / 2); left: calc((125px + 318px) / 2);">4</div>


            <button class="line-button" id="milieu-Swift-Toniz" style="top: calc((439px + 500px) / 2); left: calc((320px + 515px) / 2); background-color: var(--color-chemin-orange);"></button>
            <div class="line-text" id="chiffre-Swift-Toniz" style="top: calc((439px + 500px) / 2); left: calc((320px + 515px) / 2);">2</div>

            <button class="line-button" id="milieu-Swift-Falcon" style="top: calc((439px + 421px) / 2); left: calc((320px + 519px) / 2); background-color: var(--color-chemin-rose);"></button>
            <div class="line-text" id="chiffre-Swift-Falcon" style="top: calc((439px + 421px) / 2); left: calc((320px + 519px) / 2);">2</div>

            <button class="line-button" id="milieu-Falcon-Ariana" style="top: calc((421px + 357px) / 2); left: calc((519px + 655px) / 2); background-color: var(--color-chemin-gris);"></button>
            <div class="line-text" id="chiffre-Falcon-Ariana" style="top: calc((421px + 357px) / 2); left: calc((519px + 655px) / 2);">&nbsp;1</div>

            <button class="line-button" id="milieu-Ariana-Elixir" style="top: calc((357px + 330px) / 2); left: calc((655px + 822px) / 2); background-color: var(--color-chemin-noir);"></button>
            <div class="line-text" id="chiffre-Ariana-Elixir" style="top: calc((357px + 330px) / 2); left: calc((655px + 822px) / 2);">2</div>

            <button class="line-button" id="milieu-Scala-Perl" style="top: calc((622px + 590px) / 2); left: calc((370px + 510px) / 2); background-color: var(--color-chemin-rouge);"></button>
            <div class="line-text" id="chiffre-Scala-Perl" style="top: calc((622px + 590px) / 2); left: calc((370px + 510px) / 2);">2</div>

            <button class="line-button" id="milieu-Toniz-Perl" style="top: calc((500px + 590px) / 2); left: calc((515px + 510px) / 2); background-color: var(--color-chemin-jaune);"></button>
            <div class="line-text" id="chiffre-Toniz-Perl" style="top: calc((500px + 590px) / 2); left: calc((515px + 510px) / 2);">&nbsp;1</div>

            <button class="line-button" id="milieu-Perl-Lua" style="top: calc((590px + 625px) / 2); left: calc((510px + 587px) / 2); background-color: var(--color-chemin-orange);"></button>
            <div class="line-text" id="chiffre-Perl-Lua" style="top: calc((590px + 625px) / 2); left: calc((510px + 587px) / 2);">&nbsp;1</div>

            <button class="line-button" id="milieu-Falcon-Prolog" style="top: calc((421px + 275px) / 2); left: calc((519px + 552px) / 2); background-color: var(--color-chemin-orange);"></button>
            <div class="line-text" id="chiffre-Falcon-Prolog" style="top: calc((421px + 275px) / 2); left: calc((519px + 552px) / 2);">2</div>

            <button class="line-button" id="milieu-Python-Apex" style="top: calc((345px + 185px) / 2); left: calc((125px + 218px) / 2);background-color: var(--color-chemin-gris);"></button>
            <div class="line-text" id="chiffre-Python-Apex" style="top: calc((345px + 185px) / 2); left: calc((125px + 218px) / 2);">3</div>

            <button class="line-button" id="milieu-Python-Ruby" style="top: calc((345px + 275px) / 2); left: calc((125px + 62px) / 2); background-color: var(--color-chemin-noir);"></button>
            <div class="line-text" id="chiffre-Python-Ruby" style="top: calc((345px + 275px) / 2); left: calc((125px + 62px) / 2);">&nbsp;1</div>

            <button class="line-button" id="milieu-Foulestaque-Ruby" style="top: calc((150px + 275px) / 2); left: calc((85px + 62px) / 2); background-color: var(--color-chemin-rose);"></button>
            <div class="line-text" id="chiffre-Foulestaque-Ruby" style="top: calc((150px + 275px) / 2); left: calc((85px + 62px) / 2);">2</div>

            <button class="line-button" id="milieu-Foulestaque-Java" style="top: calc((150px + 50px) / 2); left: calc((85px + 240px) / 2); background-color: var(--color-chemin-bleu);"></button>
            <div class="line-text" id="chiffre-Foulestaque-Java" style="top: calc((150px + 50px) / 2); left: calc((85px + 240px) / 2);">3</div>

            <button class="line-button" id="milieu-Kotlin-Ruby" style="top: calc((510px + 275px) / 2); left: calc((30px + 62px) / 2); background-color: var(--color-chemin-noir);"></button>
            <div class="line-text" id="chiffre-Kotlin-Ruby" style="top: calc((510px + 275px) / 2); left: calc((30px + 62px) / 2);">5</div>

            <button class="line-button" id="milieu-Java-Pascal" style="top: calc((50px + 207px) / 2); left: calc((240px + 382px) / 2); background-color: var(--color-chemin-rouge);"></button>
            <div class="line-text" id="chiffre-Java-Pascal" style="top: calc((50px + 207px) / 2); left: calc((240px + 382px) / 2);">4</div>

            <button class="line-button" id="milieu-Apex-Pascal" style="top: calc((185px + 207px) / 2); left: calc((218px + 382px) / 2);background-color: var(--color-chemin-gris);"></button>
            <div class="line-text" id="chiffre-Apex-Pascal" style="top: calc((185px + 207px) / 2); left: calc((218px + 382px) / 2);">2</div>

            <button class="line-button" id="milieu-Pascal-Prolog" style="top: calc((207px + 275px) / 2); left: calc((382px + 552px) / 2 ); background-color: var(--color-chemin-jaune);"></button>
            <div class="line-text" id="chiffre-Pascal-Prolog" style="top: calc((207px + 275px) / 2); left: calc((382px + 552px) / 2 );">3</div>


            <button class="line-button" id="milieu-Lua-Lisp" style="top: calc((631px + 578px) / 2); left: calc((595px + 720px) / 2); background-color: var(--color-chemin-orange);"></button>
            <div class="line-text" id="chiffre-Lua-Lisp" style="top: calc((631px + 578px) / 2); left: calc((595px + 720px) / 2);">2</div>

            <button class="line-button" id="milieu-Lisp-Dart" style="top: calc((578px + 350px) / 2); left: calc((720px + 908px) / 2); background-color: var(--color-chemin-noir);"></button>
            <div class="line-text" id="chiffre-Lisp-Dart" style="top: calc((578px + 350px) / 2); left: calc((720px + 908px) / 2);">5</div>

            <button class="line-button" id="milieu-Lisp-Elm" style="top: calc((578px + 580px) / 2); left: calc((715px + 932px) / 2);background-color: var(--color-chemin-gris);"></button>
            <div class="line-text" id="chiffre-Lisp-Elm" style="top: calc((578px + 580px) / 2); left: calc((715px + 932px) / 2);">4</div>

            <button class="line-button" id="milieu-Dart-Elixir" style="top: calc((350px + 330px) / 2); left: calc((908px + 822px) / 2);  background-color: var(--color-chemin-cyan);"></button>
            <div class="line-text" id="chiffre-Dart-Elixir" style="top: calc((350px + 330px) / 2); left: calc((908px + 822px) / 2);">&nbsp;1</div>

            <button class="line-button" id="milieu-Dart-Groovy" style="top: calc((350px + 282px) / 2); left: calc((908px + 912px) / 2); background-color: var(--color-chemin-vert);"></button>
            <div class="line-text" id="chiffre-Dart-Groovy" style="top: calc((350px + 282px) / 2); left: calc((908px + 912px) / 2);">&nbsp;1</div>

            <button class="line-button" id="milieu-Dart-Elm" style="top: calc((350px + 588px) / 2); left: calc((908px + 920px) / 2); background-color: var(--color-chemin-cyan);"></button>
            <div class="line-text" id="chiffre-Dart-Elm" style="top: calc((350px + 588px) / 2); left: calc((908px + 920px) / 2);">4</div>

            <button class="line-button" id="milieu-Groovy-Templake" style="top: calc((282px + 240px) / 2); left: calc((912px + 778px) / 2);  background-color: var(--color-chemin-orange);"></button>
            <div class="line-text" id="chiffre-Groovy-Templake" style="top: calc((282px + 240px) / 2); left: calc((912px + 778px) / 2);">&nbsp;1</div>

            <button class="line-button" id="milieu-Groovy-Julia" style="top: calc((282px + 230px) / 2); left: calc((912px + 1153px) / 2); background-color: var(--color-chemin-jaune);"></button>
            <div class="line-text" id="chiffre-Groovy-Julia" style="top: calc((282px + 230px) / 2); left: calc((912px + 1153px) / 2);">4</div>

            <button class="line-button" id="milieu-Templake-Elixir" style="top: calc((240px + 330px) / 2); left: calc((778px + 822px) / 2); background-color: var(--color-chemin-rose);"></button>
            <div class="line-text" id="chiffre-Templake-Elixir" style="top: calc((240px + 330px) / 2); left: calc((778px + 822px) / 2);">&nbsp;1</div>

            <button class="line-button" id="milieu-Templake-Fortran" style="top: calc((210px + 145px) / 2); left: calc((770px + 877px) / 2);background-color: var(--color-chemin-gris);"></button>
            <div class="line-text" id="chiffre-Templake-Fortran" style="top: calc((210px + 145px) / 2); left: calc((770px + 877px) / 2);">2</div>

            <button class="line-button" id="milieu-Templake-Laraville" style="top: calc((145px + 163px) / 2); left: calc((877px + 620px) / 2); background-color: var(--color-chemin-noir);"></button>
            <div class="line-text" id="chiffre-Templake-Laraville" style="top: calc((145px + 163px) / 2); left: calc((877px + 620px) / 2);">2</div>

            <button class="line-button" id="milieu-Fortran-Groovy" style="top: calc((145px + 282px) / 2); left: calc((877px + 912px) / 2); background-color: var(--color-chemin-bleu);"></button>
            <div class="line-text" id="chiffre-Fortran-Groovy" style="top: calc((145px + 282px) / 2); left: calc((877px + 912px) / 2);">2</div>

            <button class="line-button" id="milieu-Assembly-Pascal" style="top: calc((41px + 207px) / 2); left: calc((413px + 382px) / 2); background-color: var(--color-chemin-cyan);"></button>
            <div class="line-text" id="chiffre-Assembly-Pascal" style="top: calc((41px + 207px) / 2); left: calc((413px + 382px) / 2);">2</div>

            <button class="line-button" id="milieu-Pascal-Delphi" style="top: calc((207px + 143px) / 2); left: calc((382px + 460px) / 2); background-color: var(--color-chemin-rose);"></button>
            <div class="line-text" id="chiffre-Pascal-Delphi" style="top: calc((207px + 143px) / 2); left: calc((382px + 460px) / 2);">&nbsp;1</div>

            <button class="line-button" id="milieu-Delphi-Haskell" style="top: calc((133px + 158px) / 2); left: calc((460px + 608px) / 2); background-color: var(--color-chemin-vert);"></button>
            <div class="line-text" id="chiffre-Delphi-Haskell" style="top: calc((133px + 158px) / 2); left: calc((460px + 608px) / 2);">2</div>

            <button class="line-button" id="milieu-Haskell-Laraville" style="top: calc((76px + 158px) / 2); left: calc((745px + 608px) / 2); background-color: var(--color-chemin-vert);"></button>
            <div class="line-text" id="chiffre-Haskell-Laraville" style="top: calc((76px + 158px) / 2); left: calc((745px + 608px) / 2);">3</div>

            <button class="line-button" id="milieu-Haskell-Prolog" style="top: calc((158px + 283px) / 2); left: calc((608px + 530px) / 2); background-color: var(--color-chemin-noir);"></button>
            <div class="line-text" id="chiffre-Haskell-Prolog" style="top: calc((158px + 283px) / 2); left: calc((608px + 530px) / 2);">2</div>

            <button class="line-button" id="milieu-Prolog-Ariana" style="top: calc((275px + 357px) / 2); left: calc((552px + 655px) / 2); background-color: var(--color-chemin-rouge);"></button>
            <div class="line-text" id="chiffre-Prolog-Ariana" style="top: calc((275px + 357px) / 2); left: calc((552px + 655px) / 2);">2</div>

            <button class="line-button" id="milieu-Prolog-Laraville" style="top: calc((285px + 76px) / 2); left: calc((542px + 745px) / 2); background-color: var(--color-chemin-bleu);"></button>
            <div class="line-text" id="chiffre-Prolog-Laraville" style="top: calc((285px + 76px) / 2); left: calc((542px + 745px) / 2);">4</div>

            <button class="line-button" id="milieu-Laraville-Fortran" style="top: calc((76px + 135px) / 2); left: calc((745px + 865px) / 2);background-color: var(--color-chemin-gris);"></button>
            <div class="line-text" id="chiffre-Laraville-Fortran" style="top: calc((76px + 135px) / 2); left: calc((745px + 865px) / 2);">&nbsp;1</div>

            <button class="line-button" id="milieu-Fortran-Ada" style="top: calc((135px + 69px) / 2); left: calc((865px + 1100px) / 2); background-color: var(--color-chemin-cyan);"></button>
            <div class="line-text" id="chiffre-Fortran-Ada" style="top: calc((135px + 69px) / 2); left: calc((865px + 1100px) / 2);">4</div>

            <button class="line-button" id="milieu-Ada-Groovy" style="top: calc((69px + 270px) / 2); left: calc((1100px + 912px) / 2); background-color: var(--color-chemin-orange);"></button>
            <div class="line-text" id="chiffre-Ada-Groovy" style="top: calc((69px + 270px) / 2); left: calc((1100px + 912px) / 2);">4</div>

            <button class="line-button" id="milieu-Ada-Cobol" style="top: calc((69px + 150px) / 2); left: calc((1100px + 1140px) / 2);background-color: var(--color-chemin-gris);"></button>
            <div class="line-text" id="chiffre-Ada-Cobol" style="top: calc((69px + 150px) / 2); left: calc((1100px + 1140px) / 2);">&nbsp;1</div>

            <button class="line-button" id="milieu-Cobol-Julia" style="top: calc((150px + 227px) / 2); left: calc((1140px + 1153px) / 2); background-color: var(--color-chemin-jaune);"></button>
            <div class="line-text" id="chiffre-Cobol-Julia" style="top: calc((150px + 227px) / 2); left: calc((1140px + 1153px) / 2);">&nbsp;1</div>

            <button class="line-button" id="milieu-Julia-Erlang" style="top: calc((227px + 545px) / 2); left: calc((1153px + 1105px) / 2); background-color: var(--color-chemin-rose);"></button>
            <div class="line-text" id="chiffre-Julia-Erlang" style="top: calc((227px + 545px) / 2); left: calc((1153px + 1105px) / 2);">6</div>

            <button class="line-button" id="milieu-Erlang-Elm" style="top: calc((545px + 580px) / 2); left: calc((1105px + 932px) / 2); background-color: var(--color-chemin-bleu);"></button>
            <div class="line-text" id="chiffre-Erlang-Elm" style="top: calc((545px + 580px) / 2); left: calc((1105px + 932px) / 2);">3</div>

            <button class="line-button" id="milieu-Assembly-Delphi" style="top: calc((41px + 133px) / 2); left: calc((413px + 460px) / 2); background-color: var(--color-chemin-bleu);"></button>
            <div class="line-text" id="chiffre-Assembly-Delphi" style="top: calc((41px + 133px) / 2); left: calc((413px + 460px) / 2);">&nbsp;1</div>

            <button class="line-button" id="milieu-Falcon-Toniz" style="top: calc((419px + 500px) / 2); left: calc((517px + 500px) / 2); background-color: var(--color-chemin-rouge);"></button>
            <div class="line-text" id="chiffre-Falcon-Toniz" style="top: calc((419px + 500px) / 2); left: calc((517px + 500px) / 2);">&nbsp;1</div>


        </div>

    </div>
    <div class=" side-panel left-panel">
        <div class="card-column">
            <div class="card-row">
                <img src="{{ asset('images/wc_orange.png') }}" alt="Carte Wagon Orange" class="wagon-card">
                <span class="card-quantity orange">3</span>
            </div>
            <div class="card-row">
                <img src="{{ asset('images/wc_red.png') }}" alt="Carte Wagon Rouge" class="wagon-card">
                <span class="card-quantity red">2</span>
            </div>
            <div class="card-row">
                <img src="{{ asset('images/wc_violet.png') }}" alt="Carte Wagon Violet" class="wagon-card">
                <span class="card-quantity violet">5</span>
            </div>
            <div class="card-row">
                <img src="{{ asset('images/wc_yellow.png') }}" alt="Carte Wagon Jaune" class="wagon-card">
                <span class="card-quantity yellow">4</span>
            </div>
            <div class="card-row">
                <img src="{{ asset('images/wc_black.png') }}" alt="Carte Wagon Noir" class="wagon-card">
                <span class="card-quantity black">1</span>
            </div>
            <div class="card-row">
                <img src="{{ asset('images/wc_blue.png') }}" alt="Carte Wagon Bleu" class="wagon-card">
                <span class="card-quantity blue">6</span>
            </div>
            <div class="card-row">
                <img src="{{ asset('images/wc_cyan.png') }}" alt="Carte Wagon Cyan" class="wagon-card">
                <span class="card-quantity cyan">2</span>
            </div>
            <div class="card-row">
                <img src="{{ asset('images/wc_green.png') }}" alt="Carte Wagon Vert" class="wagon-card">
                <span class="card-quantity green">3</span>
            </div>
            <div class="card-row">
                <img src="{{ asset('images/wc_loco.png') }}" alt="Carte Locomotive" class="wagon-card">
                <span class="card-quantity loco">1</span>
            </div>
        </div>
    </div>



    <div class="side-panel right-panel">
        Autres joueurs & Chat
        <!-- Bande à droite pour afficher le nom des autres joueurs et le chat -->
        <div id="message_body">
            <script defer src="{{ asset('js/script.js') }}"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
            <div id="utilisateur" data-nom="{{ auth()->user()->name }}" style="display: none;"></div>
            <div id="message-container"></div>
            <form id="send-container">
                <input type="text" id="message-input">
                <button type="submit" id="send-button"><i class="bi bi-arrow-up-circle-fill"></i></button>
            </form>
        </div>

    </div>
    <div class="card-draw">
        <!-- Bande en bas pour afficher les cartes à piocher -->
        Cartes à piocher
    </div>
</div>

<!-- <script>
    const segment = document.querySelector('.map-segment');

    // Ajouter un gestionnaire d'événements de clic
    segment.addEventListener('click', function() {
        // Actions à effectuer lors du clic sur le segment
        console.log('Segment cliqué !');
    });
</script> -->

@endsection