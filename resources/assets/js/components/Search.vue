<template>
    <!--<div class="search">-->
        <!--<input type="text" placeholder="Искать группы, людей" v-on:keyup="search" v-model="query" @blur="blurSearch">-->
        <!--<div class="results" v-show="result">-->
            <!--<ul>-->
                <!--<li v-for="user in users.slice(0, 5)">-->
                    <!--<router-link :to="{ name: 'user', params: { id: user.id } }">{{ user.first_name + ' ' + user.last_name }}</router-link>-->
                <!--</li>-->
                <!--<li v-if="users.length > 5">-->
                    <!--<router-link :to="url">Показать всех пользователей</router-link>-->
                <!--</li>-->
                <!--<li v-show="!users.length">-->
                    <!--<a href="javascript:void(0)">Нет найденных пользователей</a>-->
                <!--</li>-->
            <!--</ul>-->
        <!--</div>-->
    <!--</div>-->

    <div class="sr">
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
            <form role="search">
                <div class="form-group">
                    <div class="input-search">
                        <i class="input-search-icon md-search" aria-hidden="true"></i>
                        <input type="text" class="form-control" name="site-search" placeholder="Поиск..." v-on:keyup="search" v-model="query" @blur="blurSearch">
                        <button type="button" class="input-search-close icon md-close"
                                data-target="#site-navbar-search"
                                data-toggle="collapse" aria-label="Close"></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Site Navbar Seach -->

    </div>
</template>

<script>
    export default {
        name: "search",
        data() {
            return {
                query: '',
            }
        },
        methods: {
            search() {
                if(this.query.length > 1) {
                    axios.get(document.location.origin + '/api/users?q=' + this.query)
                        .then(response => {

                            var results_div = $('.search__results'),
                                users = response.data.users;

                            results_div.addClass('show');

                            if (users.length === 0) {
                                results_div.find('ul').empty();
                                results_div.find('ul')
                                    .append('<li><a href="javascript:void(0)">Нет найденных пользователей</a></li>')
                            } else {
                                results_div.find('ul').empty();

                                $.each(users, function (k, item) {
                                    results_div.find('ul')
                                        .append('<li><a href="' + document.location.origin + '/dashboard/user/'+ item.uuid +'">' + item.first_name + ' ' + item.last_name + '</a></li>')
                                });
                            }
                        })
                }
                else {
                    $('.search__results').removeClass('show');
                }
            },
            blurSearch() {
                setTimeout(() => {
                    $('.search__results').removeClass('show');
                }, 300)
            }
        },
    }
</script>