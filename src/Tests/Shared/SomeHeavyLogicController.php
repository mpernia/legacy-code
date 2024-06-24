<?php
/**
 * De los principios SOLID. Se espera que cumpla la S.
 * Siguiendo los principios de código limpio revisar la semántica y comentarios.
 * Basándomos que estamos en un entorno Laravel API si se considera oportuno habría que apoyarse en
 * funcionalidades ya dadas.
 * Aplicar Ley de Demeter si es necesario.
 * Seguir estándar de nombres de variables y métodos en camelcase y carga semántica.
 * Comprobar que no haya features php obsoletas
 * Aplicar inmutabilidad
 *
 * Nota: El fin no es hacer que el código funcione. Apoyandonos en abstracciones generales y buenas
 * practicas de programación, responsabilidad por capas,
 * proponer una mejora en la arquitectura del código y resolver algún problema que se pueda
 * encontrar.
 */
class SomeHeavyLogicController extends AppController
{
    public function __construct()
    {
        $this->logicOneService = new LogicOneService();
    }

    public function logicOne()
    {
        //product family id
        $some_Id = $_GET['id'];
        //result is an array of products obtained by product family id
        $result = $this->logicOneService->getItems($some_Id);
        return $result;
    }

    /**
     * this method allows front to send any message to a group of users
     * and excluding some of them
     */
    public function logic_two(Request $request)
    {
        //integer usersIds
        $users = $request->get('users');
        $message = $request->get('message');
        //integer usersIds which
        $excluded = $request->get('excluded');
        //boolean async_mode
        $async_mode = $request->get('async_mode');

        //in case $result is in async mode it will return 1 otherwise it will
        // return an array of users and the response status code of
        //the maicroservice that sends the emails
        $result = (new LogicTwoService())->sendEmails($users, $message, $excluded, $async_mode);
        return $result;
    }

    /**
     * this method will dispatch the ETL process and wont return anything
     * but it should send some alert to a monitor queue in case of some error (to-do)
     * this should be securized and allowd only for some root users
     */
    public function Logic3(LogicThreeService $logicThreeService)
    {
        $tenantsToProcess = DB::query(
            "SELECT * FROM tenants WHERE 1=1 AND deleted_at IS NULL"
        );
        // all etl registers with tenant-id and its last time of execution
        $etlRegisters = EntityEtl::where('prompt', 'not-launched')->get();

        $data = [];
        foreach ($tenantsToProcess as $tenant) {
            //$tenant is the tenant id
            $etlRegister = array_filter($etlRegisters, fn($obj) => $obj->tenant_id === $tenant);
            //what about if last-excecution-time is empty?

            //dispatch the etl process returns 1 for error and 0 for success
            $data[$tenant] = $logicThreeService->dispatchEtlForTenant($tenant, $etlRegister->executions->times->getLast());
        }
        $result = $etlRegister->executions->times->getLast();
        //todo send alert to queue in a case of error
    }
}
