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
        $title = '집에 대한 새로운 생각';
        $description = '나에게 가장 충실한 인간적인 집을 설계하다.<br>빌리브에 산다는 것은 집에 대한 새로운 생각에 사는 것.';
        break;
      case '03': //건축시설
        $title = '당신의 곁에 항상 머물다';
        $description = '삶과 어우러지는 교육, 의료, 연구, 상업시설 및 물류플랜트,<br class="pc-only">호텔리조트, 스포츠시설 등 다양한 분야에서 공간가치 창출';
        break;
      case '04': //토목시설
        $title = '모두가 필요한';
        $description = '도로, 철도, 항만 및 교량, 부지조성, 신재생에너지에<br class="pc-only">이르기까지 국토에 생명력을 부여하는 자연과 공간의 연결';
        break;
      case '05': //레저사업
        $title = '언제나 편히 즐기는';
        $description = '자연과 함께하는 새로운 경험 & 도심에서 즐기는 여유<br class="pc-only">한차원 높은 풍요로움과 마음의 행복';
        break;
    }
  }

@endphp

{{-- 프로젝트 메인 컨텐트형식의 템플릿 --}}
@extends('main.ko.project.pj_layout', [
      'title'       => $title,
      'description' => $description,   
      'biz_area'    => $biz_area,
      'category'    => $category
  ])
