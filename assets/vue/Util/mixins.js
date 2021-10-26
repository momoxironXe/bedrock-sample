export default {
    methods: {
        isActive(postId, id) {
            return postId === id ? "active" : "";
        },
        listItemClass(postId, id, classes, children = 0) {
            let returnClass = "";
            classes ? returnClass += `${classes}` : null;
            children.length ? returnClass += ` has-children` : null;
            postId === id ? returnClass += " current-page" : null;
            return returnClass;
        },
        isObjEmpty(obj) {
            return Object.keys(obj).length === 0;
        },
        objHasKey(obj, key) {
            return obj.hasOwnProperty(key);
        }
    },
};
