@extends('layout.home')

@section('title','个人资料')

@section('list')

<div class="profile-panel" role="main">

    <!-- ngIf: pageTitleVisible -->
    <h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope">
        <span ng-bind="pageTitle" class="ng-binding">
            个人资料
        </span>
        <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted">
        </span>
    </h3>
    <!-- end ngIf: pageTitleVisible -->
    <div class="profile-panelcontent" ng-transclude="">
        <div class="profileinfo ng-scope">
            <p class="profileinfo-item">
                <span class="profileinfo-label">
                    头像：
                </span>
                <span class="profileinfo-face">
                    <img src="{{$res->upic}}" style ="border-radius:50%">
                </span>
            </p>
            <p class="profileinfo-item">
                <span class="profileinfo-label">
                    用户名：
                </span>
                <span>
                    <span class="profileinfo-value ng-binding">
                       {{$res->uname}}
                    </span>
                </span>
            </p>
             <p class="profileinfo-item">
                <span class="profileinfo-label">
                    年龄：
                </span>
                <span>
                    <span class="profileinfo-value ng-binding">
                      {{$res->age}}
                    </span>
                </span>
            </p>
             <p class="profileinfo-item">
                <span class="profileinfo-label">
                    性别：
                </span>
                <span>
                    <span class="profileinfo-value ng-binding">
                         @if($res->sex == 1)
                          女
                        @else
                           男
                        @endif
                    </span>
                </span>
            </p>
             <p class="profileinfo-item">
                <span class="profileinfo-label">
                   电话：
                </span>
                <span>
                    <span class="profileinfo-value ng-binding">
                       {{$res->tel}}
                    </span>
                </span>
            </p>
             <p class="profileinfo-item">
                <span class="profileinfo-label">
                   地址：
                </span>
                <span>
                    <span class="profileinfo-value ng-binding">
                       {{$res->addr}}
                    </span>
                </span>
            </p>
            <!-- ngIf: user.email -->
        </div>
    </div>
</div>


@endsection