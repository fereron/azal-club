$(document).ready(function () {
    $('#addMember').typeahead({
            hint: true,
            highlight: true,
            minLength: 2
        },
        {
            limit: 10,
            async: true,
            source: function (query, processSync, processAsync) {
                return $.ajax({
                    url: "/api/users",
                    type: 'GET',
                    data: {q: query},
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    dataType: 'json',
                    success: function (json) {
                        return processAsync(json.users);
                    }
                });
            },
            templates: {
                suggestion: function (obj) {
                    return '<div>' + obj.full_name + '</div>';
                }
            },
            displayKey: 'full_name',
        });

    $('#addMemberSubmit').on('click', function (e) {
        e.preventDefault();

        var query = $(this).parents('.member_add_form').find('#addMember').val(),
            group_id = $('#page').data('id');
        toastr.options = {"positionClass": "toast-bottom-right",};

        if (query) {

            $.ajax({
                url: "/api/group/user/add",
                type: 'POST',
                data: {query: query, group_id: group_id},
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                dataType: 'json',
                success: function (json) {
                    if (json.error) {
                        toastr.error(json.message);
                    } else if (json.attached) {
                        toastr.warning('Пользователь ' + query + ' уже состоит в группе.');
                    } else if (json.added) {
                        var count_div = $('.masonry-item.members .members__count span');
                        var count = count_div.html();
                        count++;
                        count_div.html(count);
                        toastr.success('Пользователь ' + query + ' успешно добавлен.');
                    } else if (json.invited) {

                    }

                }
            });
        } else {
            toastr.error('Введите имя участника или его эл. адрес.');
        }

    });

    $('#submitPublishForm').on('click', function (e) {
        e.preventDefault();

        var form = $(this).parents('form'),
            body = form.find('textarea').val(),
            group_id = form.data('groupId');

        $.ajax({
            url: AppConfig.routes.groupPostAdd,
            type: 'POST',
            data: {
                group_id: group_id,
                body: body
            },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            success: function (json) {
                console.log(json.post)

                var div = '<div class="card card-shadow">\n' +
                    '                            <div class="card-block media clearfix p-25">\n' +
                    '                                <div class="pr-20">\n' +
                    '                                    <a href="user/'+ json.user.uuid +'" class="avatar avatar-lg">\n' +
                    '                                        <img class="img-fluid" src="/storage/users/avatars/'+ json.user.avatar + '">\n' +
                    '                                    </a>\n' +
                    '                                </div>\n' +
                    '                                <div class="media-body text-middle">\n' +
                    '                                    <h4 class="mt-0 mb-5">\n' +
                    json.user.full_name +
                    '                                    </h4>\n' +
                    '                                    <small>Опубликовано '+ json.post.date +'</small>\n' +
                    '                                </div>\n' +
                    '                            </div>\n' +
                    '                            <div class="card-block px-25  pt-0">\n' +
                    '                                <p class="card-text mb-20">\n' +
                    json.post.body +
                    '                                </p>\n' +
                    '                            </div>\n' +
                    '                            <div class="card-footer p-20">\n' +
                    '                                    <form class="wall-comment-reply" data-post-id="'+ json.post.id +'">\n' +
                    '                                        <input type="text" class="form-control" placeholder="Напишите что-нибудь...">\n' +
                    '                                    </form>\n' +
                    '                            </div>\n' +
                    '                        </div>';

                var adding_div = $(div).hide();

                form.parents('.card').after(adding_div);

                $(adding_div).fadeIn('slow');
                form.find('textarea').val('');

            }
        });
    });


    $('.wall-comment-reply').on('submit', function (e) {

        e.preventDefault();

        var form = $(this),
            body = form.find('input').val(),
            post_id = form.data('postId'),
            group_id = form.data('groupId');

        $.ajax({
            url: AppConfig.routes.groupPostCommentAdd,
            type: 'POST',
            data: {
                group_id: group_id,
                post_id: post_id,
                body: body
            },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            success: function (json) {
                console.log(json.comment);

                var div = '<div class="wall-comment">\n' +
                    '                                    <a href="#" class="avatar avatar-md float-left">\n' +
                    '                                        <img src="/storage/users/avatars/'+ json.user.avatar + '" >\n' +
                    '                                    </a>\n' +
                    '                                    <div class="ml-60">\n' +
                    '                                        <a href="user/'+ json.user.uuid +'">'+ json.user.full_name +'</a>\n' +
                    '                                        <small class="ml-10">'+ json.comment.date +'</small>\n' +
                    '                                        <p class="mt-5">\n' +
                        json.comment.body +
                    '                                        </p>\n' +
                    '                                    </div>\n' +
                    '                                </div>';

                form.before(div);
                form.find('input').val('')

            }
        });
    });

});

function textareaResize() {
    var textarea = document.getElementById('publish_textarea');
    textarea.style.minHeight = textarea.scrollHeight + 'px';
}