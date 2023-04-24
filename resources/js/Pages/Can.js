export function can(permissionsArray, permissionString) {
    if (permissionsArray && permissionsArray.length > 0) {
        console.log('test')
         return  permissionsArray.includes(permissionString);
    }else {
        console.log('here')
        return true
    }
}
