@extends('dashboard.layouts.app')

@push('styles')
    <link rel="stylesheet" href="/global/vendor/select2/select2.css">
    <link rel="stylesheet" href="/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="/global/vendor/bootstrap-markdown/bootstrap-markdown.css">
    <link rel="stylesheet" href="/global/vendor/bootstrap-select/bootstrap-select.css">
    <link rel="stylesheet" href="/assets/examples/css/apps/forum.css">
    <link rel="stylesheet" href="/global/fonts/font-awesome/font-awesome.css">
@endpush

@section('body-class', 'app-forum page-aside-left')

@section('content')
    <div class="page bg-white">
            <!-- Forum Content Header -->
            <div class="page-header">
                <h1 class="page-title">Все обсуждения</h1>
                <form class="mt-20" action="#" role="search">
                    <div class="input-search input-search-dark">
                        <input type="text" class="form-control w-full" placeholder="Искать..." name="">
                        <button type="submit" class="input-search-btn">
                            <i class="icon md-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Forum Nav -->
            <div class="page-nav-tabs">
                <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="active nav-link" data-toggle="tab" href="#forum-newest" aria-controls="forum-newest"
                           aria-expanded="true" role="tab">Newest</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-toggle="tab" href="#forum-activity" aria-controls="forum-activity"
                           aria-expanded="false" role="tab">Activity</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-toggle="tab" href="#forum-answer" aria-controls="forum-answer"
                           aria-expanded="false" role="tab">Answer</a>
                    </li>
                </ul>
            </div>

            <!-- Forum Content -->
            <div class="page-content tab-content page-content-table nav-tabs-animate">
                <div class="tab-pane animation-fade active" id="forum-newest" role="tabpanel">
                    <table class="table is-indent">
                        <tbody>
                        @foreach($threads as $thread)
                            <tr data-url="panel.tpl" data-toggle="slidePanel">
                            <td class="pre-cell"></td>
                            <td class="cell-60 responsive-hide">
                                <a class="avatar" href="javascript:void(0)">
                                    <img class="img-fluid" src="{{ $thread->author }}" alt="...">
                                </a>
                            </td>
                            <td>
                                <div class="content">
                                    <div class="title">
                                        Vicinum at aperta, torquem mox doloris illi, officiis.
                                        <div class="flags responsive-hide">
                                            <span class="sticky-top badge badge-round badge-danger"><i class="icon md-caret-up-circle" aria-hidden="true"></i>TOP</span>
                                            <i class="locked icon md-lock" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="metas">
                                        <span class="author">By Herman Beck</span>
                                        <span class="started">1 day ago</span>
                                        <span class="badges">Themes</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cell-80 forum-posts">
                                <span class="num">1</span>
                                <span class="unit">Post</span>
                            </td>
                            <td class="suf-cell"></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <ul class="pagination pagination-gap">
                        <li class="disabled page-item"><a class="page-link" href="javascript:void(0)">Previous</a></li>
                        <li class="active page-item"><a class="page-link" href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">5</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">Next</a></li>
                    </ul>
                </div>
                <div class="tab-pane animation-fade" id="forum-activity" role="tabpanel">
                    <table class="table is-indent">
                        <tbody>
                        <tr data-url="panel.tpl" data-toggle="slidePanel">
                            <td class="pre-cell"></td>
                            <td class="cell-60 responsive-hide">
                                <a class="avatar" href="javascript:void(0)">
                                    <img class="img-fluid" src="/global/portraits/11.jpg"
                                         alt="...">
                                </a>
                            </td>
                            <td>
                                <div class="content">
                                    <div class="title">
                                        Repellere summo tritani uterque nullo sollicitudines. Frui lectorem.
                                        <div class="flags responsive-hide">
                                            <span class="sticky-top badge badge-round badge-danger"><i class="icon md-caret-up-circle" aria-hidden="true"></i>TOP</span>
                                            <i class="locked icon md-lock" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="metas">
                                        <span class="author">By Gwendolyn Wheeler</span>
                                        <span class="started">1 day ago</span>
                                        <span class="tags">Technical Support</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cell-80 forum-posts">
                                <span class="num">1</span>
                                <span class="unit">Post</span>
                            </td>
                            <td class="suf-cell"></td>
                        </tr>
                        <tr data-url="panel.tpl" data-toggle="slidePanel">
                            <td class="pre-cell"></td>
                            <td class="cell-60 responsive-hide">
                                <a class="avatar" href="javascript:void(0)">
                                    <img class="img-fluid" src="/global/portraits/12.jpg"
                                         alt="...">
                                </a>
                            </td>
                            <td>
                                <div class="content">
                                    <div class="title">
                                        Malarum beate spe consilia fabulae, intervalla verbum falso.
                                        <div class="flags responsive-hide">
                                            <i class="locked icon md-lock" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="metas">
                                        <span class="author">By Daniel Russell</span>
                                        <span class="started">2 days ago</span>
                                        <span class="tags">Plugins</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cell-80 forum-posts">
                                <span class="num">2</span>
                                <span class="unit">Posts</span>
                            </td>
                            <td class="suf-cell"></td>
                        </tr>
                        <tr data-url="panel.tpl" data-toggle="slidePanel">
                            <td class="pre-cell"></td>
                            <td class="cell-60 responsive-hide">
                                <a class="avatar" href="javascript:void(0)">
                                    <img class="img-fluid" src="/global/portraits/13.jpg"
                                         alt="...">
                                </a>
                            </td>
                            <td>
                                <div class="content">
                                    <div class="title">
                                        Nomini libris ergo errorem solido sitne oratio, mediocriterne.
                                        <div class="flags responsive-hide">
                                            <span class="sticky-top badge badge-round badge-danger"><i class="icon md-caret-up-circle" aria-hidden="true"></i>TOP</span>
                                            <i class="locked icon md-lock" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="metas">
                                        <span class="author">By Sarah Graves</span>
                                        <span class="started">3 days ago</span>
                                        <span class="tags">Announcements</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cell-80 forum-posts">
                                <span class="num">3</span>
                                <span class="unit">Posts</span>
                            </td>
                            <td class="suf-cell"></td>
                        </tr>
                        <tr data-url="panel.tpl" data-toggle="slidePanel">
                            <td class="pre-cell"></td>
                            <td class="cell-60 responsive-hide">
                                <a class="avatar" href="javascript:void(0)">
                                    <img class="img-fluid" src="/global/portraits/14.jpg"
                                         alt="...">
                                </a>
                            </td>
                            <td>
                                <div class="content">
                                    <div class="title">
                                        Terrore ennius, sumitur tum provincia quae probatum fingi.
                                        <div class="flags responsive-hide">
                                            <i class="locked icon md-lock" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="metas">
                                        <span class="author">By Andrew Hoffman</span>
                                        <span class="started">4 days ago</span>
                                        <span class="tags">Installation</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cell-80 forum-posts">
                                <span class="num">4</span>
                                <span class="unit">Posts</span>
                            </td>
                            <td class="suf-cell"></td>
                        </tr>
                        <tr data-url="panel.tpl" data-toggle="slidePanel">
                            <td class="pre-cell"></td>
                            <td class="cell-60 responsive-hide">
                                <a class="avatar" href="javascript:void(0)">
                                    <img class="img-fluid" src="/global/portraits/15.jpg"
                                         alt="...">
                                </a>
                            </td>
                            <td>
                                <div class="content">
                                    <div class="title">
                                        Statua iucundius brevis beatam finitas suscipit ipsis incursione.
                                        <div class="flags responsive-hide">
                                            <span class="sticky-top badge badge-round badge-danger"><i class="icon md-caret-up-circle" aria-hidden="true"></i>TOP</span>
                                            <i class="locked icon md-lock" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="metas">
                                        <span class="author">By Camila Lynch</span>
                                        <span class="started">5 days ago</span>
                                        <span class="tags">Configuration</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cell-80 forum-posts">
                                <span class="num">5</span>
                                <span class="unit">Posts</span>
                            </td>
                            <td class="suf-cell"></td>
                        </tr>
                        <tr data-url="panel.tpl" data-toggle="slidePanel">
                            <td class="pre-cell"></td>
                            <td class="cell-60 responsive-hide">
                                <a class="avatar" href="javascript:void(0)">
                                    <img class="img-fluid" src="/global/portraits/16.jpg"
                                         alt="...">
                                </a>
                            </td>
                            <td>
                                <div class="content">
                                    <div class="title">
                                        Laus optime turbulenta carere cotidie deduceret aequo metuamus.
                                        <div class="flags responsive-hide">
                                            <span class="sticky-top badge badge-round badge-danger"><i class="icon md-caret-up-circle" aria-hidden="true"></i>TOP</span>
                                        </div>
                                    </div>
                                    <div class="metas">
                                        <span class="author">By Ramon Dunn</span>
                                        <span class="started">6 days ago</span>
                                        <span class="tags">Feature Requests</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cell-80 forum-posts">
                                <span class="num">6</span>
                                <span class="unit">Posts</span>
                            </td>
                            <td class="suf-cell"></td>
                        </tr>
                        <tr data-url="panel.tpl" data-toggle="slidePanel">
                            <td class="pre-cell"></td>
                            <td class="cell-60 responsive-hide">
                                <a class="avatar" href="javascript:void(0)">
                                    <img class="img-fluid" src="/global/portraits/17.jpg"
                                         alt="...">
                                </a>
                            </td>
                            <td>
                                <div class="content">
                                    <div class="title">
                                        Efficit accusantium voluit quales, legere inmensae. Pariuntur privamur.
                                        <div class="flags responsive-hide">
                                            <i class="locked icon md-lock" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="metas">
                                        <span class="author">By Scott Sanders</span>
                                        <span class="started">7 days ago</span>
                                        <span class="tags">Troubleshooting</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cell-80 forum-posts">
                                <span class="num">7</span>
                                <span class="unit">Posts</span>
                            </td>
                            <td class="suf-cell"></td>
                        </tr>
                        </tbody>
                    </table>
                    <ul class="pagination pagination-gap">
                        <li class="disabled page-item"><a class="page-link" href="javascript:void(0)">Previous</a></li>
                        <li class="active page-item"><a class="page-link" href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">5</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">Next</a></li>
                    </ul>
                </div>
                <div class="tab-pane animation-fade" id="forum-answer" role="tabpanel">
                    <table class="table is-indent">
                        <tbody>
                        <tr data-url="panel.tpl" data-toggle="slidePanel">
                            <td class="pre-cell"></td>
                            <td class="cell-60 responsive-hide">
                                <a class="avatar" href="javascript:void(0)">
                                    <img class="img-fluid" src="/global/portraits/2.jpg" alt="...">
                                </a>
                            </td>
                            <td>
                                <div class="content">
                                    <div class="title">
                                        Augeri, sanos simulent atomi habet ullo consuetudine saepti.
                                        <div class="flags responsive-hide">
                                            <span class="sticky-top badge badge-round badge-danger"><i class="icon md-caret-up-circle" aria-hidden="true"></i>TOP</span>
                                            <i class="locked icon md-lock" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="metas">
                                        <span class="author">By Mary Adams</span>
                                        <span class="started">1 day ago</span>
                                        <span class="tags">Plugins</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cell-80 forum-posts">
                                <span class="num">1</span>
                                <span class="unit">Post</span>
                            </td>
                            <td class="suf-cell"></td>
                        </tr>
                        <tr data-url="panel.tpl" data-toggle="slidePanel">
                            <td class="pre-cell"></td>
                            <td class="cell-60 responsive-hide">
                                <a class="avatar" href="javascript:void(0)">
                                    <img class="img-fluid" src="/global/portraits/3.jpg" alt="...">
                                </a>
                            </td>
                            <td>
                                <div class="content">
                                    <div class="title">
                                        Odioque denique teneam animis putem torquentur retinere sermone.
                                        <div class="flags responsive-hide">
                                            <span class="sticky-top badge badge-round badge-danger"><i class="icon md-caret-up-circle" aria-hidden="true"></i>TOP</span>
                                            <i class="locked icon md-lock" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="metas">
                                        <span class="author">By Caleb Richards</span>
                                        <span class="started">2 days ago</span>
                                        <span class="tags">Technical Support</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cell-80 forum-posts">
                                <span class="num">2</span>
                                <span class="unit">Posts</span>
                            </td>
                            <td class="suf-cell"></td>
                        </tr>
                        <tr data-url="panel.tpl" data-toggle="slidePanel">
                            <td class="pre-cell"></td>
                            <td class="cell-60 responsive-hide">
                                <a class="avatar" href="javascript:void(0)">
                                    <img class="img-fluid" src="/global/portraits/4.jpg" alt="...">
                                </a>
                            </td>
                            <td>
                                <div class="content">
                                    <div class="title">
                                        Diligenter accessio meque difficile propemodum posuit momenti impetu.
                                        <div class="flags responsive-hide">
                                            <span class="sticky-top badge badge-round badge-danger"><i class="icon md-caret-up-circle" aria-hidden="true"></i>TOP</span>
                                            <i class="locked icon md-lock" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="metas">
                                        <span class="author">By June Lane</span>
                                        <span class="started">3 days ago</span>
                                        <span class="tags">Code Review</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cell-80 forum-posts">
                                <span class="num">3</span>
                                <span class="unit">Posts</span>
                            </td>
                            <td class="suf-cell"></td>
                        </tr>
                        <tr data-url="panel.tpl" data-toggle="slidePanel">
                            <td class="pre-cell"></td>
                            <td class="cell-60 responsive-hide">
                                <a class="avatar" href="javascript:void(0)">
                                    <img class="img-fluid" src="/global/portraits/5.jpg" alt="...">
                                </a>
                            </td>
                            <td>
                                <div class="content">
                                    <div class="title">
                                        Terrore ennius, sumitur tum provincia quae probatum fingi.
                                        <div class="flags responsive-hide">
                                            <span class="sticky-top badge badge-round badge-danger"><i class="icon md-caret-up-circle" aria-hidden="true"></i>TOP</span>
                                            <i class="locked icon md-lock" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="metas">
                                        <span class="author">By Edward Fletcher</span>
                                        <span class="started">4 days ago</span>
                                        <span class="tags">Troubleshooting</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cell-80 forum-posts">
                                <span class="num">4</span>
                                <span class="unit">Posts</span>
                            </td>
                            <td class="suf-cell"></td>
                        </tr>
                        <tr data-url="panel.tpl" data-toggle="slidePanel">
                            <td class="pre-cell"></td>
                            <td class="cell-60 responsive-hide">
                                <a class="avatar" href="javascript:void(0)">
                                    <img class="img-fluid" src="/global/portraits/6.jpg" alt="...">
                                </a>
                            </td>
                            <td>
                                <div class="content">
                                    <div class="title">
                                        Habere nati sponte dum pericula exorsus sciscat fructuosam.
                                        <div class="flags responsive-hide">
                                            <span class="sticky-top badge badge-round badge-danger"><i class="icon md-caret-up-circle" aria-hidden="true"></i>TOP</span>
                                            <i class="locked icon md-lock" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="metas">
                                        <span class="author">By Crystal Bates</span>
                                        <span class="started">5 days ago</span>
                                        <span class="tags">Configuration</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cell-80 forum-posts">
                                <span class="num">5</span>
                                <span class="unit">Posts</span>
                            </td>
                            <td class="suf-cell"></td>
                        </tr>
                        <tr data-url="panel.tpl" data-toggle="slidePanel">
                            <td class="pre-cell"></td>
                            <td class="cell-60 responsive-hide">
                                <a class="avatar" href="javascript:void(0)">
                                    <img class="img-fluid" src="/global/portraits/7.jpg" alt="...">
                                </a>
                            </td>
                            <td>
                                <div class="content">
                                    <div class="title">
                                        Nutu fugiendus, accusata utamur iniucundus captet quippe virtutum.
                                        <div class="flags responsive-hide">
                                            <span class="sticky-top badge badge-round badge-danger"><i class="icon md-caret-up-circle" aria-hidden="true"></i>TOP</span>
                                            <i class="locked icon md-lock" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="metas">
                                        <span class="author">By Nathan Watts</span>
                                        <span class="started">6 days ago</span>
                                        <span class="tags">Announcements</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cell-80 forum-posts">
                                <span class="num">6</span>
                                <span class="unit">Posts</span>
                            </td>
                            <td class="suf-cell"></td>
                        </tr>
                        <tr data-url="panel.tpl" data-toggle="slidePanel">
                            <td class="pre-cell"></td>
                            <td class="cell-60 responsive-hide">
                                <a class="avatar" href="javascript:void(0)">
                                    <img class="img-fluid" src="/global/portraits/8.jpg" alt="...">
                                </a>
                            </td>
                            <td>
                                <div class="content">
                                    <div class="title">
                                        Parvos labore efficeret, liber timorem tarentinis accedis praebeat.
                                        <div class="flags responsive-hide">
                                            <span class="sticky-top badge badge-round badge-danger"><i class="icon md-caret-up-circle" aria-hidden="true"></i>TOP</span>
                                            <i class="locked icon md-lock" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="metas">
                                        <span class="author">By Heather Harper</span>
                                        <span class="started">7 days ago</span>
                                        <span class="tags">Themes</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cell-80 forum-posts">
                                <span class="num">7</span>
                                <span class="unit">Posts</span>
                            </td>
                            <td class="suf-cell"></td>
                        </tr>
                        </tbody>
                    </table>
                    <ul class="pagination pagination-gap">
                        <li class="disabled page-item"><a class="page-link" href="javascript:void(0)">Previous</a></li>
                        <li class="active page-item"><a class="page-link" href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">5</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Site Action -->
    <div class="site-action" data-target="#addTopicForm" data-toggle="modal" data-plugin="actionBtn">
        <button type="button" class="site-action-toggle btn-raised btn btn-success btn-floating">
            <i class="icon md-edit" aria-hidden="true"></i>
        </button>
    </div>
    <!-- End Site Action -->

    <!-- Add Topic Form -->
    <div class="modal fade" id="addTopicForm" aria-hidden="true" aria-labelledby="addTopicForm"
         role="dialog" tabindex="-1">
        <div class="modal-dialog modal-simple">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Create New Topic</h4>
                </div>
                <div class="modal-body container-fluid">
                    <form>
                        <div class="form-group">
                            <label class="form-control-label mb-15" for="topicTitle">Topic Title:</label>
                            <input type="text" class="form-control" id="topicTitle" name="title" placeholder="How To..."
                            />
                        </div>
                        <div class="form-group">
                            <textarea name="content" data-provide="markdown" data-iconlibrary="fa" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="form-control-label mb-15" for="topicCategory">Topic Category:</label>
                                    <select id="topicCategory" data-plugin="selectpicker">
                                        <option>PHP</option>
                                        <option>Javascript</option>
                                        <option>HTML</option>
                                        <option>CSS</option>
                                        <option>Ruby</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-control-label mb-15" for="topic_tags">Topic Tags:</label>
                                    <select id="topic_tags" data-plugin="selectpicker">
                                        <option>PHP</option>
                                        <option>Javascript</option>
                                        <option>HTML</option>
                                        <option>CSS</option>
                                        <option>Ruby</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer text-left">
                    <button class="btn btn-primary" data-dismiss="modal" type="submit">Create</button>
                    <a class="btn btn-sm btn-white btn-flat" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add Topic Form -->
@endsection

@push('scripts')
    <script src="/global/vendor/slidepanel/jquery-slidePanel.js"></script>
    <script src="/global/vendor/bootstrap-markdown/bootstrap-markdown.js"></script>
    <script src="/global/vendor/bootstrap-select/bootstrap-select.js"></script>
    <script src="/global/vendor/marked/marked.js"></script>
    <script src="/global/vendor/to-markdown/to-markdown.js"></script>

    <script src="/global/js/Plugin/bootstrap-select.js"></script>
    <script src="/assets/js/BaseApp.js"></script>
    <script src="/assets/js/App/Forum.js"></script>

    <script src="/assets/examples/js/apps/forum.js"></script>
@endpush