<section class="banner banner--home text-center d-flex flex-column justify-content-center">
    <h1 class="text-uppercase home-1">Software para cadastro Nis</h1>
    <h2 class="text-uppercase home-2">Teste para Gesuas João Alfonso Beleño</h2>

    <span class="pt-4 banner__buttons">
        <a href="./citizen" class="btn btn-light text-uppercase mb-2 bt-color-black">Cadastre seu Nis</a>
    </span>
</section>
<section class="about-me">
    <div class="left">
        <div class="container-text row">
            <div class="gradient-bg">
            <p style="
                padding-left: 10px;
                padding-right: 10px;
            ">Joao Alfonso Beleño - Desenvolvedor PHP</p>
            </div>

            <div>
                <!-- nome maior -->
                <h1 style="
                    font-size: 2.5rem;
                    font-weight: 800;
                    padding-left: 10px;
                    padding-right: 10px;
                ">Sobre mim</h1>
                <p style="
                    padding-left: 10px;
                    padding-right: 10px;
                ">Sou desenvolvedor com 7 anos de experiência, especializado em qualidade de código, POO e APIs. Tenho experiência em bancos de dados relacionais e não relacionais, trabalhando em sistemas de alto tráfego. Implemento soluções para consistência de dados e sou reconhecido pela minha lógica de programação e facilidade em aprender novas linguagens.</p>
                <p style="padding-left: 10px; padding-right: 10px; font-size: 1rem;">
                <strong>Principais Conhecimentos:</strong> PHP, JavaScript, HTML, CSS, Git, Vue.js, MySQL, PHPUnit
                </p>
                <p style="padding-left: 10px; padding-right: 10px; font-size: 1rem;">
                <strong>Outros Conhecimentos:</strong> RabbitMQ, AWS, Node.js, Python, TypeScript, CakePHP, Laravel, SQL, MySQL, MongoDB, New Relic, Redis, Docker, Testes Unitários, CICD
                </p>


                <!-- formacao -->
                <p style="
                    padding-left: 10px;
                    padding-right: 10px;
                "><strong>Formação:</strong> Ciencia da Computação - Universidade Estadual do Rio de Janeiro</p>
        </div>

        </div>
    </div>
    <div class="right">
        <span class="image-container">
            <img class="imagem" src="../public/images/jabo.png" alt="Descrição da imagem">
        </span>
    </div>
</section>

<style>

    .container-text{
        height: 60%;
        width: 60%;
        display: flex;
    }
    .about-me{
        width: 100%;
        height: 40rem;
        z-index: 1;
        display: flex;
    }

    .right{
        height: 100%;
        width: 50%;
        display: flex;
    }

    .left{
        height: 100%;
        width: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .gradient-bg{
        background-color: #366A7F;
        color: #fff;
        font-weight: 400;
        height: 7%;
        border-radius: 5px;
        padding: 2px;
        
    }

    .image-container{
        width: 550px;
        height: 500px;
        align-self: center;
        background-color: #366A7F;
        display: flex;
        position: relative;
        overflow: visible;
        justify-content: center;
        border-radius: 40px;
    }

    .imagem{
        height: 100%;
        transform: translateY(-0.05%)
    }

    .banner--home {
        /* fixed */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 65vh;
        width: 100%;
        background-image: url("https://www.gesuas.com.br/wp-content/themes/gesuas/img/capa-com-selo.jpg");
    }

    .home-1 {
        font-family: "Montserrat", sans-serif;
        color: #fff;
        font-size: 5.5rem;
        font-weight: 800;
    }
    .home-2 {
        font-family: "Montserrat", sans-serif;
        color: #fff;
        font-size: 2.5rem;
    }

    .bt-color-black {
        color: #fff !important;
        border-radius: 10px;
        font-size: 1.5rem;
        background-color: transparent;
        border: 4px solid #fff;
    }

    .bt-color-black:hover {
        color: rgb(55, 153, 255) !important;
        font-weight: 400;
    }

</style>