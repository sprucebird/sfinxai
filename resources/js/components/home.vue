<template>
  <div>
	<div class="page-header mb-1">
      <div class="description">
        <h3>Sveiki sugrįžę!</h3>
        <h1>Pagrindinis</h1>
      </div>
  </div>
  <div class="page-header mb-5">
    <div class="stats">
        <div class="stat mr-8">
          <span class="mt-1 status status-ok"></span>
          <h1 class="number mt-3 ml-2">{{signupsCount}}</h1>
          <div class="txt mt-2 ml-2">
            <h2>Naujų registracijų</h2>
            <h3>Nuo {{signupsCount_date}}</h3>
          </div>
        </div>

        <div class="stat mr-8">
          <span class="mt-1 status status-ok"></span>
          <h1 class="number mt-3 ml-2">+ {{income}} Eur</h1>
          <div class="txt mt-2 ml-2">
            <h2>Gauta mokėjimų suma</h2>
            <h3>per šiandien ({{income_date}})</h3>
          </div>
        </div>

        <!-- <div class="stat mr-8">
          <span class="mt-1 status status-danger"></span>
          <h1 class="number mt-3 ml-2">- 405 Eur</h1>
          <div class="txt mt-2 ml-2">
            <h2>Islaidu patirta</h2>
            <h3>nuo 2039-02-02</h3>
          </div>
        </div>
 -->
        <div class="stat">
          <span class="mt-1 status status-ok"></span>
          <h1 class="number mt-3 ml-2">{{membersCount}}</h1>
          <div class="txt mt-2 ml-2">
            <h2>nariai</h2>
            <h3>šiuo metu registruotų sistemoje</h3>
          </div>
        </div>
        <div class="stat">
          <span class="mt-1 status status-ok"></span>
          <h1 class="number mt-3 ml-2">{{activeMembersCount}}</h1>
          <div class="txt mt-2 ml-2">
            <h2><b>aktyvių</b> narių</h2>
            <h3>šiuo metu registruotų sistemoje</h3>
          </div>
        </div>
      </div>
  </div>
  <div class="page-content justify-content-center mt-5" style="padding-top: 1em;">
    <div class="page-header mb-2">
        <div class="description">
          <h3>Sistemos pranešimai</h3>
        </div>
    </div>
    <div class="alert alert-warning" style="max-width: 650px;">
      <div class="alert-header">
        Dėmesio! Norint gauti tikslią lankomumo informaciją būtina kekvienam studijos nariui priskirti jo grupę.
      </div>
      <div class="alert-body">
        <router-link to="/members" class="mt-4 btn btn-white">Narių sąrašas</router-link>
      </div>
    </div>
    <div class="alert alert-primary" style="max-width: 650px;">
      <div class="alert-header">
        Įdiegtas naujas treniruočių mechanizmas, kuris automatiškai aptinka treniruotę, ją sukuria ir apskaičiuoja aktyvius bei neaktyvius narius.
      </div>
      <div class="alert-body">
        <router-link to="/entries" class="mt-4 btn btn-white">Peržiūrėti</router-link>
      </div>
    </div>
    <!-- <div class="card big mt-5">
      <div class="card-header">
        Veiksmų centras
      </div>
      <div class="card-body">
        <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                      <thead>
                        <tr role="row"><th class="w-1 sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No.: activate to sort column descending" style="width: 45px;">Unik. Nr.</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Invoice Subject: activate to sort column ascending" style="width: 171px;">Veiksmas</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Client: activate to sort column ascending" style="width: 130px;">Narys</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="VAT No.: activate to sort column ascending" style="width: 81px;">Veiksma atliko</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created: activate to sort column ascending" style="width: 103px;">Atliktas</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 146px;">Busena</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 175px;"></th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 29px;"></th></tr>
                      </thead>
                      <tbody>
                      <tr role="row" class="odd">
                          <td class="sorting_1"><span class="text-muted">001401</span></td>
                          <td><a href="invoice.html" class="text-inherit">Atliktas naujas mokejimas</a></td>
                          <td>
                            Juozas Skarbalius
                          </td>
                          <td>
                            Karolis Paradnikas
                          </td>
                          <td>
                            2019-06-27 18:55:34
                          </td>
                          <td>
                            <span class="status-icon bg-success"></span> Paid
                          </td>
                        </tr>
                      </tbody>
                    </table>
        </div>
        <div class="alert alert-primary">
          Atsiprašome, šiuo metu veiksmų centras yra tik kūrimo stadijoje
        </div>
      </div>
      </div>
    </div> -->
  </div>
</div>
</template>

<script>

  export default {
  	data(){
  		return{
  			API_results: [],
        signupsCount: null,
        signupsCount_date: null,
        income: null,
        income_date: null,
        outcome: 0,
        outcome_date: null,
        membersCount: null,
        activeMembersCount: null,
        membersCount_date: null,
  		}
  	},
    mounted() {

      axios.get('api/stats/signups/1').then(response => {
        this.signupsCount = response.data.count;
        this.signupsCount_date = response.data.date;
      });
      axios.get('api/stats/members/count').then(response => {
        this.membersCount = response.data.count;
        this.activeMembersCount = response.data.active;
      });
      axios.get('api/stats/economy/income/1').then(response => {
        this.income = response.data.income;
        this.income_date = response.data.date;
      });
    }
  }
</script>

<style>
</style>
