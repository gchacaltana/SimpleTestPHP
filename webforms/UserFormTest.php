<?php

/**
 * Test para formulario web : Agregar usuario.
 *
 * @author Gonzalo Chacaltana <gchacaltanab@outlook.com>
 * @name UserFormTest
 * @category WebTestCase
 */
require_once(dirname(__FILE__) . '/../simpletest/autorun.php');
require_once(dirname(__FILE__) . '/../simpletest/web_tester.php');

class UserFormTest extends WebTestCase {

    function testDefaultValue() {
        $this->get('http://dev-app/test/SimpleTestPHP/webforms/form.html');
        $this->assertField('name', 'Gonzalo');
        $this->setField('name', 'Javier');
        $this->setField('email', 'gch@aol.com');
        $this->click('enviar');
    }

    /**
     * Testeando un envio de valores por POST a formulario.
     */
    function testAttemptedHack() {
        $this->post('http://dev-app/demo/index.php?r=site/addUser', array('name' => 'admin'));
        $this->assertText('Usuario creado');
    }

}
