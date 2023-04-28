	@php
		$check_commit_type = null;
	@endphp

	@if (isset($items_committee))

		@foreach($items_committee as $item)

			@if ($check_commit_type != $item->commit_type)

				<h4 class="sg-text-06">{{ $item->commit_type_nm }}</h4>

			@endif

			<div class="scroll-box">
				<table class="tbl">
				<caption><span class="blind">{{ $item->subject }}</span></caption>
				<colgroup>
					<col style="width:19%;">
					@if($item->dir_a_nm!=='선택없음') <col style="width:21%;"> @endif
					@if($item->dir_b_nm!=='선택없음') <col style="width:21%;"> @endif
					@if($item->dir_c_nm!=='선택없음') <col style="width:21%;"> @endif
					@if($item->dir_d_nm!=='선택없음') <col style="width:21%;"> @endif
				</colgroup>
				<thead>
					<tr>
					<th scope="col">개최일자</th>
					<th scope="col" colspan="4">의안내용</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>{{ $item->hold_at }}</td>
						<td colspan="4">{{ $item->subject }}</td>
					</tr>
					<tr>
						<th scope="col">가결여부</th>
						<th scope="col" colspan="4">사외이사 동의 성명</th>
					</tr>
					<tr>
						<th scope="row" rowspan="2" class="type">{{ $item->vote_st }}</th>
						@if($item->dir_a_nm!=='선택없음') <td class="name"><span>{{ $item->dir_a_nm }}</span></td> @endif
						@if($item->dir_b_nm!=='선택없음') <td class="name"><span>{{ $item->dir_b_nm }}</span></td> @endif
						@if($item->dir_c_nm!=='선택없음') <td class="name"><span>{{ $item->dir_c_nm }}</span></td> @endif
						@if($item->dir_d_nm!=='선택없음') <td class="name"><span>{{ $item->dir_d_nm }}</span></td> @endif
					</tr>
					<tr>
						@if($item->dir_a_nm!=='선택없음') <td>{{ $item->dir_a_yn }}</td> @endif
						@if($item->dir_b_nm!=='선택없음') <td>{{ $item->dir_b_yn }}</td> @endif
						@if($item->dir_c_nm!=='선택없음') <td>{{ $item->dir_c_yn }}</td> @endif
						@if($item->dir_d_nm!=='선택없음') <td>{{ $item->dir_d_yn }}</td> @endif
					</tr>
				</tbody>
				</table>
			</div>

			@php
				$check_commit_type = $item->commit_type;
			@endphp

		@endforeach

	@endif