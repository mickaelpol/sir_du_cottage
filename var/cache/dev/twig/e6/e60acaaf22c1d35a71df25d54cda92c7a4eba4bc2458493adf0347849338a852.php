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

/* bien/index.html.twig */
class __TwigTemplate_95d33ac077dbe56b66313ff6e5e4fab4ee11fe72e0f7f3dc9430ec3942b166a4 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "bien/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "bien/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "bien/index.html.twig", 1);
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
        echo "    <h1>Biens list</h1>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Preparationparquet</th>
                <th>Parquetparquet</th>
                <th>Plintheparquet</th>
                <th>Acryliqueparquet</th>
                <th>Seuilparquet</th>
                <th>Superficieparquet</th>
                <th>Cadreterrasse</th>
                <th>Platelageterrasse</th>
                <th>Vissageterrasse</th>
                <th>Superficieterrasse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["biens"] ?? $this->getContext($context, "biens")));
        foreach ($context['_seq'] as $context["_key"] => $context["bien"]) {
            // line 26
            echo "            <tr>
                <td><a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("bien_show", ["id" => $this->getAttribute($context["bien"], "id", [])]), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["bien"], "id", []), "html", null, true);
            echo "</a></td>
                <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["bien"], "nom", []), "html", null, true);
            echo "</td>
                <td>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["bien"], "preparationParquet", []), "html", null, true);
            echo "</td>
                <td>";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["bien"], "parquetParquet", []), "html", null, true);
            echo "</td>
                <td>";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($context["bien"], "plintheParquet", []), "html", null, true);
            echo "</td>
                <td>";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($context["bien"], "acryliqueParquet", []), "html", null, true);
            echo "</td>
                <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["bien"], "seuilParquet", []), "html", null, true);
            echo "</td>
                <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["bien"], "superficieParquet", []), "html", null, true);
            echo "</td>
                <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($context["bien"], "cadreTerrasse", []), "html", null, true);
            echo "</td>
                <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($context["bien"], "platelageTerrasse", []), "html", null, true);
            echo "</td>
                <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($context["bien"], "vissageTerrasse", []), "html", null, true);
            echo "</td>
                <td>";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($context["bien"], "superficieTerrasse", []), "html", null, true);
            echo "</td>
                <td>
                    <ul>
                        <li>
                            <a href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("bien_show", ["id" => $this->getAttribute($context["bien"], "id", [])]), "html", null, true);
            echo "\">show</a>
                        </li>
                        <li>
                            <a href=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("bien_edit", ["id" => $this->getAttribute($context["bien"], "id", [])]), "html", null, true);
            echo "\">edit</a>
                        </li>
                    </ul>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['bien'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "        </tbody>
    </table>

    <ul>
        <li>
            <a href=\"";
        // line 56
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("bien_new");
        echo "\">Create a new bien</a>
        </li>
    </ul>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "bien/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 56,  161 => 51,  149 => 45,  143 => 42,  136 => 38,  132 => 37,  128 => 36,  124 => 35,  120 => 34,  116 => 33,  112 => 32,  108 => 31,  104 => 30,  100 => 29,  96 => 28,  90 => 27,  87 => 26,  83 => 25,  60 => 4,  51 => 3,  29 => 1,);
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
    <h1>Biens list</h1>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Preparationparquet</th>
                <th>Parquetparquet</th>
                <th>Plintheparquet</th>
                <th>Acryliqueparquet</th>
                <th>Seuilparquet</th>
                <th>Superficieparquet</th>
                <th>Cadreterrasse</th>
                <th>Platelageterrasse</th>
                <th>Vissageterrasse</th>
                <th>Superficieterrasse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        {% for bien in biens %}
            <tr>
                <td><a href=\"{{ path('bien_show', { 'id': bien.id }) }}\">{{ bien.id }}</a></td>
                <td>{{ bien.nom }}</td>
                <td>{{ bien.preparationParquet }}</td>
                <td>{{ bien.parquetParquet }}</td>
                <td>{{ bien.plintheParquet }}</td>
                <td>{{ bien.acryliqueParquet }}</td>
                <td>{{ bien.seuilParquet }}</td>
                <td>{{ bien.superficieParquet }}</td>
                <td>{{ bien.cadreTerrasse }}</td>
                <td>{{ bien.platelageTerrasse }}</td>
                <td>{{ bien.vissageTerrasse }}</td>
                <td>{{ bien.superficieTerrasse }}</td>
                <td>
                    <ul>
                        <li>
                            <a href=\"{{ path('bien_show', { 'id': bien.id }) }}\">show</a>
                        </li>
                        <li>
                            <a href=\"{{ path('bien_edit', { 'id': bien.id }) }}\">edit</a>
                        </li>
                    </ul>
                </td>
            </tr>
        {% endfor %}
        </tbody>
    </table>

    <ul>
        <li>
            <a href=\"{{ path('bien_new') }}\">Create a new bien</a>
        </li>
    </ul>
{% endblock %}
", "bien/index.html.twig", "/home/micka/Documents/workspace/projet_symfony3/sir_du_cottage_bis/app/Resources/views/bien/index.html.twig");
    }
}
