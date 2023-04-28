{{-- 
  // 페이지명 : 신세계 건설 : 사업분야
  // 설명 : 신세계 건설의 사업분야를 표시 한다.
--}}

@php
  
  $title = null;
  $description = null;

  if(isset($biz_area))
  {
    switch($biz_area)
    {
      default:
      case '02': //주거시설
        $title = 'A new idea of home';
        $description = 'Design the most faithful and humane house for me.<br>Living in a bilive means living in a new way of thinking about home.';
        break;
      case '03': //건축시설
        $title = 'Always at your side';
        $description = 'Creates spacial value in various aspects such as education, health, research, commercial facilities, logistics plants, hotel and resorts and sports facilities, while being in harmony with your life';
        break;
      case '04': //토목시설
        $title = 'For everyone';
        $description = 'Connecting nature and space gives vitality to the land, encompassing road, railroad, port, bridge, site construction, and renewable energy.';
        break;
      case '05': //레저사업
        $title = 'Always enjoy and relax';
        $description = 'New experience in nature & Feeling relaxed in the city<br class="pc-only">Feeling enriched and satisfied at heart.';
        break;
    }
  }

@endphp

{{-- 프로젝트 메인 컨텐트형식의 템플릿 --}}
@extends('main.en.project.pj_layout', [
      'title'       => $title,
      'description' => $description,   
      'biz_area'    => $biz_area,
      'category'    => $category
  ])
