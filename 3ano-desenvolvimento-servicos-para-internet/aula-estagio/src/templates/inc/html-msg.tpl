{if $formTemErros eq true}

    <div class="alert alert-error">
        <strong>Aviso:</strong>
        <ul>
            <li>{join array=$errosHtml glue=";</li><li>"};</li>
        </ul>
    </div>
	
{/if}

{if $formMsgOk neq ''}
    <div class="alert alert-success"><strong>Parabéns: </strong>{$formMsgOk}</div>
{/if}