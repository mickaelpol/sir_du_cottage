<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* bien/show.html.twig */
class __TwigTemplate_7329d80dcbae6c448acff7b52b80784fd5ff070a233aabcf7cef2dc9084a44e2 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "bien/show.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "bien/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "bien/show.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <h1>Bien</h1>

    <table>
        <tbody>
            <tr>
                <th>Id</th>
                <td>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute(($context["bien"] ?? $this->getContext($context, "bien")), "id", []), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Nom</th>
                <td>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute(($context["bien"] ?? $this->getContext($context, "bien")), "nom", []), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Preparationparquet</th>
                <td>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute(($context["bien"] ?? $this->getContext($context, "bien")), "preparationParquet", []), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Parquetparquet</th>
                <td>";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute(($context["bien"] ?? $this->getContext($context, "bien")), "parquetParquet", []), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Plintheparquet</th>
                <td>";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute(($context["bien"] ?? $this->getContext($context, "bien")), "plintheParquet", []), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Acryliqueparquet</th>
                <td>";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute(($context["bien"] ?? $this->getContext($context, "bien")), "acryliqueParquet", []), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Seuilparquet</th>
                <td>";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute(($context["bien"] ?? $this->getContext($context, "bien")), "seuilParquet", []), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Superficieparquet</th>
                <td>";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute(($context["bien"] ?? $this->getContext($context, "bien")), "superficieParquet", []), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Cadreterrasse</th>
                <td>";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute(($context["bien"] ?? $this->getContext($context, "bien")), "cadreTerrasse", []), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Platelageterrasse</th>
                <td>";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute(($context["bien"] ?? $this->getContext($context, "bien")), "platelageTerrasse", []), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Vissageterrasse</th>
                <td>";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute(($context["bien"] ?? $this->getContext($context, "bien")), "vissageTerrasse", []), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Superficieterrasse</th>
                <td>";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute(($context["bien"] ?? $this->getContext($context, "bien")), "superficieTerrasse", []), "html", null, true);
        echo "</td>
            </tr>
        </tbody>
    </table>

    <ul>
        <li>
            <a href=\"";
        // line 61
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("bien_index");
        echo "\">Back to the list</a>
        </li>
        <li>
            <a href=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("bien_edit", ["id" => $this->getAttribute(($context["bien"] ?? $this->getContext($context, "bien")), "id", [])]), "html", null, true);
        echo "\">Edit</a>
        </li>
        <li>
            ";
        // line 67
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["delete_form"] ?? $this->getContext($context, "delete_form")), 'form_start');
        echo "
                <input type=\"submit\" value=\"Delete\">
            ";
        // line 69
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["delete_form"] ?? $this->getContext($context, "delete_form")), 'form_end');
        echo "
        </li>
    </ul>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "bien/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  172 => 69,  167 => 67,  161 => 64,  155 => 61,  145 => 54,  138 => 50,  131 => 46,  124 => 42,  117 => 38,  110 => 34,  103 => 30,  96 => 26,  89 => 22,  82 => 18,  75 => 14,  68 => 10,  60 => 4,  51 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block body %}
    <h1>Bien</h1>

    <table>
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ bien.id }}</td>
            </tr>
            <tr>
                <th>Nom</th>
                <td>{{ bien.nom }}</td>
            </tr>
            <tr>
                <th>Preparationparquet</th>
                <td>{{ bien.preparationParquet }}</td>
            </tr>
            <tr>
                <th>Parquetparquet</th>
                <td>{{ bien.parquetParquet }}</td>
            </tr>
            <tr>
                <th>Plintheparquet</th>
                <td>{{ bien.plintheParquet }}</td>
            </tr>
            <tr>
                <th>Acryliqueparquet</th>
                <td>{{ bien.acryliqueParquet }}</td>
            </tr>
            <tr>
                <th>Seuilparquet</th>
                <td>{{ bien.seuilParquet }}</td>
            </tr>
            <tr>
                <th>Superficieparquet</th>
                <td>{{ bien.superficieParquet }}</td>
            </tr>
            <tr>
                <th>Cadreterrasse</th>
                <td>{{ bien.cadreTerrasse }}</td>
            </tr>
            <tr>
                <th>Platelageterrasse</th>
                <td>{{ bien.platelageTerrasse }}</td>
            </tr>
            <tr>
                <th>Vissageterrasse</th>
                <td>{{ bien.vissageTerrasse }}</td>
            </tr>
            <tr>
                <th>Superficieterrasse</th>
                <td>{{ bien.superficieTerrasse }}</td>
            </tr>
        </tbody>
    </table>

    <ul>
        <li>
            <a href=\"{{ path('bien_index') }}\">Back to the list</a>
        </li>
        <li>
            <a href=\"{{ path('bien_edit', { 'id': bien.id }) }}\">Edit</a>
        </li>
        <li>
            {{ form_start(delete_form) }}
                <input type=\"submit\" value=\"Delete\">
            {{ form_end(delete_form) }}
        </li>
    </ul>
{% endblock %}
", "bien/show.html.twig", "/home/micka/Documents/workspace/projet_symfony3/sir_du_cottage_bis/app/Resources/views/bien/show.html.twig");
    }
}
